<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 
<?php
$datos_bd = array();
$nameErr = "";
$name = $paterno = $materno =  "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nombre"])) {
    $nameErr = "Nombre completo es requirido";
  } else {
    $name = strtoupper ($_POST["nombre"]); 
    $paterno = strtoupper ($_POST["paterno"]); 
    $materno = strtoupper ($_POST["materno"]); 
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
    $bd->exec("INSERT INTO datos (nombre, paterno, materno) VALUES('".$name."','".$paterno."','".$materno."')");
    $sentencia = $bd->prepare('SELECT * from datos');
    $sentencia->execute();
    $datos_bd=$sentencia->fetchAll();
    unset($sentencia);
    unset($bd);
  }
}
?>
<p><span class="error">* campo requerido</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  
  Nombre: <input type="text" name="nombre" value="<?php echo $name;?>"><span class="error">* <?php echo $nameErr;?></span><br>
   Paterno: <input type="text" name="paterno" value="<?php echo $paterno;?>"><span class="error">* <?php echo $nameErr;?></span><br>
    Materno: <input type="text" name="materno" value="<?php echo $materno;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br> <br><br>
  <input type="submit" name="Guardar" value="Guardar">  
</form><br>

<?php
echo "<h2>Capturado Reciente:</h2>";
echo "<hr>".$name." ".$paterno." ".$materno;
echo "<hr><h2>Registros en BD:</h2>";
echo "<table>";
$cont=0;
foreach ($datos_bd as  $value) {
  $cont++;
  echo "<tr><td>".$cont."</td>"."<td>".$value["nombre"]." ".$value["paterno"]." ".$value["materno"]."</td></tr>";  
}
echo "</table>";
?>
</body>
</html>