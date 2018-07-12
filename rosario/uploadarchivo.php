<?php
//iniciar la session 
//
//

session_start();

echo 'Bienvenido a la Pagina de Subir Imagenes ';
echo "<br>";
echo "\n";
$_SESSION['usuario']  = $_POST['nombre'];
$_SESSION['apellido'] =  $_POST['apellido'];
 
print_r($_SESSION); 
echo "<br>";
echo "\n";

$datos_cookie = array(
		'nombre' => $_POST['nombre'],
		'apellido' => $_POST['apellido'],

	);
// setcookie("cookie_img", $datos_cookie);
setcookie("cookie_img", serialize($datos_cookie),time()+3600 );
//setcookie("cookie_img", $datos_cookie, time()+3600);  /* expira en una hora */
// setcookie("cookie_img", $datos_cookie, time()+3600, "/~rasmus/", "example.com", 1);
// 
// 
$cookie_get = unserialize($_COOKIE['cookie_img']);
echo "<pre>" . print_r($cookie_get,true) . "</pre>";

 
echo "<br>";
echo "\n";


 
echo "<pre>" .print_r($_FILES). "</pre>";
$tmp_name = $_FILES['archivo']['tmp_name'];
//$tmp_name= $tmp_name[0];
print_r($tmp_name);
print_r($_FILES);
// guardar en base de datos
// usuario nombre apellido e imagen
// consulta para traer la info.
// y meterla a la cookie e imprimir la iformacion
// eliminar la cookie
// boton que diga borrar cookie
// $array = ;
 
$direccion = 'C:\xampp\htdocs\cursophp\\';
//$direccion = "http://localhost/cursophp/";

$imagen= $direccion . basename($_FILES['archivo']['name']);
//Variables del metodo POST
 
if(!is_writable($direccion)){
	echo " no se puede accesar la direccion _ " . $direccion;
}else{
	if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
		 
		if (move_uploaded_file($_FILES['archivo']['tmp_name'], $imagen)) {
			 	echo "<br>";
				echo "\n";
				echo "Se subio tu imagen.\n";			 
				
		 guardar_datos();
		} else {
		 
		}
	}else{
		 
		echo "nombre del archivo '". $_FILES['archivo']['tmp_name'] . "'.";
	}
}
  	

    function guardar_datos(){
 
	//$conexion = mysql_connect("localhost", "root", "");
	// $bd = mysql_database("test", $conexion);

	 $mysqli = new mysqli('127.0.0.1', 'root', '', 'test');
	 $mysqli->set_charset("utf8");

/*
$res = $mysqli->query("SELECT * FROM personas");

while($f = $res->fetch_object()){
    echo $f->nombre.' <br/>';
}
*/
	if(isset($_POST['nombre'])){
		$nombre = $_POST['nombre'];
		if($nombre !=""){
			$sql = "INSERT INTO imagen (id_imagen, nombre, apellido, imagen_name) values (null, '".$_POST['nombre']."', '".$_POST['apellido']."','".$_FILES['archivo']['name']."')";
			$res = $mysqli->query($sql);	
			//mysql_query($sql);  
		}
	}
 
	$sql = "SELECT * FROM imagen";	

	$resultado = $mysqli->query($sql);
	echo "<table border='1'><tr><td> NOMBRE</td> <td> APELLIDO</td> <td> IMAGEN SUBIDA</td></tr>";
	while($f = $resultado->fetch_object()){
			echo "<tr><td>";
		echo $f->nombre.' </td> <td>' .  $f->apellido .' </td> <td>' .  $f->imagen_name ;
		echo "</td></tr>";
	}
	echo "</table>";
 
 
 
}

	echo "<div><img src='http://localhost/cursophp/". basename($_FILES['archivo']['name']) ."' /></div>";

 	echo "<br>";
	echo "\n";
    echo "<button id='terminar' ><a href='http://localhost/cursophp/llenafile.php'> Llenar ARchivo TXT</a></button> "; 

	 
 
?>