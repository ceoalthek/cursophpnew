<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario de nombre</title>
	<?php 
	ini_set('display_errors', 1);
	if(isset($_POST['usuario'])){

		// Inicia proceso de insertar
		$_POST['usuario'] = sanear_string($_POST['usuario']);
		$_POST['password'] = sanear_string($_POST['password']);

		// echo "<pre>" . print_r($_SERVER,true)."</pre>";

		$nombre = md5($_POST['usuario']);
		$password = md5($_POST['password']);
		$ip = get_IP();
		$explorador = $_SERVER['HTTP_USER_AGENT'];

		$conn = conectar();
		try{
			$conn->exec("INSERT INTO registros_e (nombre, paterno, materno, imagen ) VALUES ('$nombre', '$password', '$ip', '$explorador') ");
		}catch(PDOException $e){
		    echo "ERROR EN EL INSERT: " . $e->getMessage();
		}

		
	}

	function conectar()
    {
        try{
            $s = new PDO('mysql:host=127.0.0.1;dbname=test', "root", "12345678",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            return $s;
        }catch(PDOException $e) {
        	echo 'Falló la Conexión: '.$e->getMessage();
        }
    }

	function sanear_string($string){
 
	    $string = trim($string);
	 
	    $string = str_replace(
	        array('"'),
	        array(''),
	        $string
	    );
	    $string = str_replace(
	        array("'"),
	        array(""),
	        $string
	    );
	 
	    
	 
	    return $string;
	}

	function get_IP() {
	    if (!empty($_SERVER['HTTP_CLIENT_IP']))
	        return $_SERVER['HTTP_CLIENT_IP'];
	    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
	        return $_SERVER['HTTP_X_FORWARDED_FOR'];
	    return $_SERVER['REMOTE_ADDR'];
	}
	?>
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data" autocomplete="off">
		<label>Usuario</label>
		<input type="text" name="usuario">
		<br>
		<label>Password</label>
		<input type="password" name="password">
		<br>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>