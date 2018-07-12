<?php
	function login(){
		try {
			// Conexión a la base de datos
			$connect = new PDO('mysql:host=localhost;dbname=ejercicio2', 'root', '');
		    $connect ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		    // Sacar un resultado
		    $sql = $connect->prepare('SELECT * FROM usuario WHERE user = :usuario and pass = :contrasena');
		    $sql->execute( array( 'usuario'=>$_POST['usuario'], 'contrasena'=>$_POST['pass']));
		    $resultado = $sql->fetchAll();

	 		//echo $resultado[0]['user'] . "<br>";
	    	//var_dump($resultado[0]);

	    	if ( $resultado ){
				setcookie("user", $resultado[0]["user"], time() + 3600);
				setcookie("pass", $resultado[0]["pass"], time() + 3600);
				echo $_COOKIE["user"] . " " . $_COOKIE["pass"];
				header("Location: form.php");
			}else{
				header("Location: index.php");
			}
			/*
	    	// Sacar todos los resultados de la base de datos
		    $sql = $connect->prepare('SELECT * FROM captura');
		    $sql->execute();
		    $resultado = $sql->fetchAll();
		 	
		    // Mostrar resultados
		    echo "<html><body><table border=1>";
			echo "<tr><th>id</th><th>Nombre</th><th>url de imagen</th></tr>";
			
			foreach ($resultado as $value) {
	        	echo "<tr><td>".$value["idCaptura"]."</td><td>".$value["nombre"]."</td><td>".
			         $value["imagen"]."</td></tr>";
			}

			echo "</table></body></html>";
			*/
		} catch (Exception $e) {
			exit("Unable to connect: " . $e->getMessage());
		}
	}
	login();
?>