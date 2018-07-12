<?php

	function obtiene_datos(){

		$servidor = "localhost";
		$usuario = "root";
		$contrasena = "";
		$BD = "ejercicio2";
		
		$conexion = new mysqli($servidor, $usuario, $contrasena, $BD);

		$res = $conexion->multi_query("CALL get_captura();");

		if( !$res ){
			echo "Falló la llamada : (" . $conexion->errno . ") " . $conexion->error;
		}else{
			$res = $conexion->store_result();
			if ( $res ){
				setcookie("resultado_consulta", serialize($res), time() + (60*60*24*15));
				
				//var_dump(unserialize($_COOKIE["resultado_consulta"]));
				//echo $res["idCaptura"]. " " . $res["nombre"] . " " . $res["imagen"];
				//var_dump($res->fetch_all());
		        //printf("\n");
		        /*La llamada a free() no es obligatoria, pero si recomendable para aligerar memoria y para evitar problemas si después hacemos una llamada a otro procedimiento*/
				$path = "resultado_captura.txt";
				if (!file_exists($path))
				    exit("Archivo no encontrado");
				$file = fopen($path, "r+");

				echo "<html><body><table border=1>";
				echo "<tr><th>id</th><th>Nombre</th><th>url de imagen</th></tr>";
				
				foreach ($res as $value) {
		        	fwrite($file, $value["idCaptura"]. "\t" . $value["nombre"] . "\t" . $value["imagen"] . "\n");
		        
				    echo "<tr><td>".$value["idCaptura"]."</td><td>".$value["nombre"]."</td><td>".
				         $value["imagen"]."</td></tr>";
				}

				echo "</table></body></html>";
				$res->free();
				fclose($file);

				//header("Location: form.php");
			}else{
				echo "Falló la llamada...";
			}
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
<form action="logout.php" method="post" accept-charset="utf-8">
	<div>
		<button type="submit">Logout</button>
	</div>
</form>
</body>
</html>