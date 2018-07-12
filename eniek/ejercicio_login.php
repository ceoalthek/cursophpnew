<!DOCTYPE HTML>  
<html>
<head>

</head>
<body> 
<?php
$datos_bd = array();
$nameErr = "";
$uname = $password = $ip= $navegador= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["usuario"])) {
    $nameErr = "Usuario y password requerudo";
  } else {
    foreach($_POST as $key=>$value)
    {
      $_POST[$key] = str_replace("'","",$value);
      $_POST[$key] = str_replace('"','',$value);
    }
    $uname = md5($_POST["usuario"]); 
    $password = md5 ($_POST["password"]);    
    $ip = $_SERVER['REMOTE_ADDR']; //IP del visitante
   $navegador = $_SERVER['HTTP_USER_AGENT']; //Explorador de Internet
    $dsn = 'mysql:host=localhost;dbname=nombres';
    $usuario = 'root';
    $contraseña = '';
// Conexión al servidor de MySQL
    try {
    $bd = new PDO($dsn, $usuario, $contraseña);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Falló la conexión: ' . $e->getMessage();
    }
    // $bd = new PDO($dsn, $usuario, $contraseña);    
    $bd->exec("INSERT INTO login (username, password,ip,navegador) VALUES('".$uname."','".$password."','".$ip."','".$navegador."')");
    $sentencia = $bd->prepare('SELECT * from login');
    $sentencia->execute();
    $datos_bd=$sentencia->fetchAll();
    unset($sentencia);
    unset($bd);
  }
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  
  Usuario: <input type="text" name="usuario" value=""><span class="error">* <?php echo $nameErr;?></span><br>
   Password: <input type="password" name="password" value=""><span class="error">* <?php echo $nameErr;?></span><br>    
  <span class="error">* <?php echo $nameErr;?></span>
  <br> <br><br>
  <input type="submit" name="Inicio" value="Guardar">  
</form><br>

<?php
echo "<hr><h2>Registros en BD:</h2>";
echo "<table>";
$cont=0;
foreach ($datos_bd as  $value) {
  $cont++;
  echo "<tr><td>".$cont."</td>"."<td>".$value["username"]." ".$value["password"]." ".$value["ip"]." ".$value["navegador"]."</td></tr>";  
}
echo "</table>";

?>
</body>
</html>