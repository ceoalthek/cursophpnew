<?php 
	$servidor = "127.0.0.1";
	$usuario = "root";
	$contrasena = "12345678";
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
				header("Location: http://env.local.com/cursophpnew/irving/ejercicio2/form.php");
			}else{
				header("Location: http://env.local.com/cursophpnew/irving/ejercicio2/index.php");
			}
		}
	}
	login($conexion);
?>