<!DOCTYPE html>
<?php
	function sube_archivo(){
		$dir_subida = 'archivos/';
		$fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);

		echo '<pre>';
		if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
			if( sube_datos($fichero_subido) )
		    	echo "El fichero es válido y se subió con éxito.\n";
		    else
		    	echo "Falló la llamada...";
		} else {
		    echo "¡Posible ataque de subida de ficheros!\n";
		}

		echo 'Más información de depuración:';
		print_r($_FILES);

		print "</pre>";
	}
	sube_archivo();

	function sube_datos($fichero){

		$servidor = "127.0.0.1";
		$usuario = "root";
		$contrasena = "12345678";
		$BD = "ejercicio2";
		
		$conexion = new mysqli($servidor, $usuario, $contrasena, $BD);

		$res = $conexion->query("CALL insert_captura('" . $_POST['nombre'] . "', '" . $fichero . "');");

		if( !$res ){
			return false;
		}else{
			return true;
		}
	}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="form.php" method="post" accept-charset="utf-8">
		<div>
			<button type="submit" href>regresar</button>
		</div>
	</form>
</body>
</html>