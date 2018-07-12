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
			//var_dump($_POST);
			foreach ($_POST as $key => $value) {
				$_POST[$key] = str_replace("'","",$value);
				$_POST[$key] = str_replace('"','',$value);
			}

		    $sql = $connect->prepare("CALL login(?, ?); ");
		    $sql->bindParam(1, md5($_POST['usuario']), PDO::PARAM_STR, 255);
			$sql->bindParam(2, md5($_POST['pass']), PDO::PARAM_STR, 255);
			$sql->execute();
			$resultado = $sql->fetchAll();
			
	 		//echo $resultado[0]['user'] . "<br>";
	    	//var_dump($resultado[0]);
			updatelogin($connect, $resultado[0]["idUduario"]);

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
	function updatelogin($id){
		try {
			// Conexión a la base de datos
			$connect = new PDO('mysql:host=localhost;dbname=ejercicio2', 'root', '');
		    $connect ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			exit("Unable to connect: " . $e->getMessage());
		}
		try{
		    // Sacar un resultado
		    $sql = $connect->prepare('UPDATE usuario SET ip=:ip, explorador=:exp WHERE idUduario = :id' );
		    $sql->bindParam(':ip', $_SERVER['REMOTE_ADDR'], PDO::PARAM_STR);       
			$sql->bindParam(':exp', $_SERVER['HTTP_USER_AGENT'], PDO::PARAM_STR);    
			$sql->bindParam(':id', $id, PDO::PARAM_INT);
		    $sql->execute();
		    return true;
		} catch (PDOException $e){
			die("Failed: " . $e->getMessage());
			return false;
		}
	}
	login();
?>