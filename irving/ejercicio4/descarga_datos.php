<?php

	function obtiene_datos(){
		try {
			// Conexión a la base de datos
			$connect = new PDO('mysql:host=localhost;dbname=ejercicio2', 'root', '');
		    $connect ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					    
	    	// Sacar todos los resultados de la base de datos
		    $sql = $connect->prepare('SELECT * FROM captura');
		    $sql->execute();
		    $resultado = $sql->fetchAll();
		 	
		 	setcookie("resultado_consulta", serialize($resultado), time() + (60*60*24*15));

		 	$path = "resultado_captura.txt";
			if (!file_exists($path))
			    exit("Archivo no encontrado");
			$file = fopen($path, "r+");

			// Mostrar resultados
		    echo "<html><body><table border=1>";
			echo "<tr><th>id</th><th>Nombre</th><th>url de imagen</th></tr>";
			
			foreach ($resultado as $value) {
				fwrite($file, $value["idCaptura"]. "\t" . $value["nombre"] . "\t" . $value["imagen"] . "\r\n");
				
	        	echo "<tr><td>".$value["idCaptura"]."</td><td>".$value["nombre"]."</td><td>".
			         $value["imagen"]."</td></tr>";
			}

			echo "</table></body></html>";
						
			fclose($file);
		} catch (Exception $e) {
			exit("Unable to connect: " . $e->getMessage());
		}
	}

	obtiene_datos();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<br>
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