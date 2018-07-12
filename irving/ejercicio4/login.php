<?php
	function login(){
		try {
			// Conexión a la base de datos
			$connect = new PDO('mysql:host=localhost;dbname=ejercicio2', 'root', '');
		    $connect ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			exit("Unable to connect: " . $e->getMessage());
		}
		try {
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
		} catch (PDOException $e) {
			exit("Unable to connect: " . $e->getMessage());
		}
	}
	login();
?>