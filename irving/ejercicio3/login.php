<?php 
	$servidor = "localhost";
	$usuario = "root";
	$contrasena = "";
	$BD = "ejercicio2";
	
	$conexion = new mysqli($servidor, $usuario, $contrasena, $BD);

	function login($conexion){
		$res = $conexion->query("CALL login('" . $_POST['usuario'] . "', '" . $_POST['pass'] . "');");

		if( !$res ){
			echo "Falló la llamada : (" . $conexion->errno . ") " . $conexion->error;
		}else{
			//var_dump(mysqli_fetch_assoc($res));
			$res = mysqli_fetch_assoc($res);
			if ( $res ){
				setcookie("user", $res["user"], time() + 3600);
				setcookie("pass", $res["pass"], time() + 3600);
				echo $_COOKIE["user"] . " " . $_COOKIE["pass"];
				header("Location: form.php");
			}else{
				header("Location: index.php");
			}
		}
	}
	login($conexion);
?>