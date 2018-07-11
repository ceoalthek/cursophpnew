<?php
	
	 function recupera_datos(){
		$con = new mysqli('localhost','root','12345678', 'prueba');
		if($con->connect_error){
			exit( "fallo conexion");
		}	
		$query = "SELECT * FROM nombre";	
		$result = $con->query($query);
		if($result->num_rows > 0){
			$dir = "/var/www/html/cursophpnew/simon/archivo.txt";
			if (!file_exists($dir))
				echo "Archivo no encontrado";

			$file = fopen($dir, "w");
			while($data = $result->fetch_assoc()) {
		       fwrite($file, $data['nombre'] . "\t" .$data['paterno']. "\t" .$data['materno']."\t" . "\n");
		    }
			fclose($file);
		}
	}
	function leer_file(){
		$path = "/var/www/html/cursophpnew/simon/archivo.txt";
		if (!file_exists($path))
		    exit("Archivo no encontrado");
		$file = fopen($path, "r");
		echo "<html><body><table border=1>";
		echo "<tr><th>Nombre</th><th>Paterno</th><th>Materno</th></tr>";
		$cokie = array();
		while ($data = fscanf($file, "%s\t%s\t%s\t\n")) {
		    list ($nombre, $paterno, $materno) = $data;
		    echo "<tr><td>".$nombre."</td><td>".$paterno."</td><td>".
		         $materno."</td></tr>";
		         $cokie[] = $nombre . ' ' . $paterno . ' ' . $materno; 
		}
		echo "</table></body></html>";
		fclose($file);
		setcookie("file", serialize($cokie), time()+3600);
		print_r($_COOKIE['file']);
		header('Location: /cursophpnew/simon/files.php');
	}

	if(isset($_GET['valor'])) leer_file();
	recupera_datos();

?>