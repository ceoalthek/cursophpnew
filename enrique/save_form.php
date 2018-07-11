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


	if(is_array($_FILES)){
		if(isset($_FILES['archivo'])){
			
			$target_file = "imagen.png";
			echo "carpeta temporal: " . $_FILES["archivo"]["tmp_name"] . "<br>";
			// echo "Nombre archivo: " . $_FILES["archivo"]["name"] . "<br>";
			// echo __DIR__;
			if(file_exists($target_file)){
				unlink($target_file);
			}

			if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $_FILES["archivo"]["name"] )){
				echo "SUBIO";
				$_SESSION['imagen'] = 1;
			}else {
			    echo "No subio";
			}
		}

	}

	header('Location: datos_cookie.php');
}

function conecta(){
	$conexion = mysql_connect("127.0.0.1", "root", "12345678");
	$bd = mysql_select_db("test", $conexion);
}
?>