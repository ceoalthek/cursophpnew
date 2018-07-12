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

		try {
			// Conexión a la base de datos
			$connect = new PDO('mysql:host=localhost;dbname=ejercicio2', 'root', '');
		    $connect ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			exit("Unable to connect: " . $e->getMessage());
		}

		try{
		    // Sacar un resultado
		    $sql = $connect->prepare('INSERT INTO captura (nombre, imagen) VALUES (?, ?)');
		    $connect->beginTransaction();
		    $sql->execute( array( $_POST['nombre'], $fichero));
		    $connect->commit();
		    return true;
		} catch (PDOException $e){
			$connect->rollBack();
			die("Failed: " . $e->getMessage());
			return false;
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
	<br>
	<form action="logout.php" method="post" accept-charset="utf-8">
		<div>
			<button type="submit">Logout</button>
		</div>
	</form>
</body>
</html>