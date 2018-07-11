<?php
if( isset($_POST['nombre']) ){
	if( $_POST['nombre'] != '' ){
		guarda_nombre();
	}
}

function guarda_nombre(){
	conecta();
	
	$sql = "INSERT INTO registros (id, nombre, paterno, materno) values (null, '".$_POST['nombre'][0]."', '".$_POST['paterno'][0]."', '".$_POST['materno'][0]."')";
	mysql_query($sql);


	$array = array(
		'nombre' => $_POST['nombre'][0],
		'paterno' => $_POST['paterno'][0],
		'materno' => $_POST['materno'][0]
	);
	setcookie("registro", serialize($array));

	header('Location: datos_cookie.php');
}

function conecta(){
	$conexion = mysql_connect("192.168.33.22", "root", "12345678");
	$bd = mysql_select_db("test", $conexion);


}
?>