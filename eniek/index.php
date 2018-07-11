<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php

$nameErr = "";
$name = $paterno = $materno =  "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nombre"])) {
    $nameErr = "Nombre completo es requirido";
  } else {
    $name = strtoupper ($_POST["nombre"]); 
    $paterno = strtoupper ($_POST["paterno"]); 
    $materno = strtoupper ($_POST["materno"]); 
    $link = mysql_connect('127.0.0.1', 'root', '')
      or die('No se pudo conectar: ' . mysql_error());
      echo 'Connected successfully';

      mysql_select_db('nombres') or die('No se pudo seleccionar la base de datos');

  // Realizar una consulta MySQL
       $sql = "INSERT INTO datos (nombre, paterno, materno) VALUES ('".$name."','".$paterno."','".$materno."')";
       mysql_query($sql);   
    if (!$_FILES["error"]) {
      $dir_subida = '';
      $fichero_subido = $dir_subida . basename($_FILES['fichero_usuario']['name']);
      //echo '<pre>';
      if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) { 
        // echo "El fichero es válido y se subió con éxito.\n";
      } else {
        // echo "¡Posible ataque de subida de ficheros!\n";
      }
    //echo 'Más información de depuración:';
    //print_r($_FILES);
    //print "</pre>";
    }
  }
}

function star() {
session_start();
$_SESSION["newsession"]=TRUE;
echo " ".$_SESSION['newsession']." SESION INICIADA";
}

function inser_arch() {
  $link = mysql_connect('127.0.0.1', 'root', '')
      or die('No se pudo conectar: ' . mysql_error());
      // echo 'Connected successfully';

  mysql_select_db('nombres') or die('No se pudo seleccionar la base de datos');
  $query = 'SELECT * FROM datos';
  $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

  $file = fopen("archivo.txt", "w");
 while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
      
      foreach ($line as $col_value) {
        fwrite($file, "$col_value<br>" . PHP_EOL);
          // echo "$col_value<br>";
          $row[]=$col_value;
      }
      
  }
  // fwrite($file, "texto insertado" . PHP_EOL);
  //
  fclose($file);
  echo "se agrego ".serialize($row);
}

function conecta_db() {
  $row= array();
  // Conectando, seleccionando la base de datos
  $link = mysql_connect('127.0.0.1', 'root', '')
      or die('No se pudo conectar: ' . mysql_error());
      // echo 'Connected successfully';

  mysql_select_db('nombres') or die('No se pudo seleccionar la base de datos');
  $query = 'SELECT * FROM datos';
  $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

  // Imprimir los resultados en HTML
  
  while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
      
      foreach ($line as $col_value) {
          // echo "$col_value<br>";
          $row[]=$col_value;
      }
      
  }
 // echo "<PRE>".print_r($row);
  crearc($row);
  // Liberar resultados
  mysql_free_result($result);

  // Cerrar la conexión
  mysql_close($link);
 // echo "<pre>".print_r($row)."</pre>";
}
 function crearc($datos) {
  // $array = array('nombre'=>'Eniek Leon','url'=>'imagen.jpg');
  setcookie("info", serialize($datos), time()+1296000);
  echo $_COOKIE['info'];
}
function salir() {
if(!isset($_SESSION['newsession']))
   {
      echo "No hay ninguna sesion iniciada";
      //esto ocurre cuando la sesion caduca.
        
   }
   else
   { 
     session_destroy();
     echo "Has cerrado la sesion";
      // echo "salio";      
   }
 
}
?>
<p><span class="error">* campo requerido</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  
  Nombre: <input type="text" name="nombre" value="<?php echo $name;?>"><span class="error">* <?php echo $nameErr;?></span><br>
   Paterno: <input type="text" name="paterno" value="<?php echo $paterno;?>"><span class="error">* <?php echo $nameErr;?></span><br>
    Materno: <input type="text" name="materno" value="<?php echo $materno;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
 <input type="file"
               name="ident"
               accept="image/png, image/jpeg" />
  <br><br>
  <input type="submit" name="Guardar" value="Submit">  
</form><br>
<input type="button" name="" value="SESION" id="boton1" onclick = "iniciar();">
<input type="button" name="" value="LOGOUT" id="boton2" onclick = "salir();">
<input type="button" name="" value="Archivo" id="boton3" onclick = "ins_arch();">
<input type="button" name="" value="Base_DB" id="boton4" onclick = "con_db();">
<?php
echo "<h2>Capturado:</h2>";
echo "<hr>".print_r($name." ".$paterno." ".$materno);
?>

<script>
  function iniciar(){
    console.log("boton iniciar");
    alert('<?php echo star(); ?>');
   
  }
   function salir(){
    console.log("boton salir");
    alert('<?php echo salir(); ?>');
   
  }
   function ins_arch(){
    console.log("boton archivo");
    alert('<?php echo inser_arch(); ?>');
   
  }
   function con_db(){
    console.log("boton bd");
    alert('<?php echo conecta_db(); ?>');
   
  }
</script>
</body>
</html>