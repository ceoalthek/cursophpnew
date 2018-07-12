<?php
	$usuario = "root";
	$pass = "12345678";
	try{
		//abro conexion
	    $con = new PDO('mysql:host=localhost;dbname=prueba', $usuario, $pass);
	    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e){
	    echo "ERROR: " . $e->getMessage();
	}
	//inserto datos
	
	$consulta = "INSERT INTO nombre (nombre,paterno,materno) values('Pedro','Pica','Piedra')";
	$con->exec($consulta);
	//consultamos la info de la tabla
	$consulta = "SELECT * FROM nombre";
	//Ejecutamos la consulta y guardamos el resultado
	$resultado = $con->query($consulta);
	while($registro = $resultado->fetch()) {
    	echo "NOMBRE: " . $registro['nombre'] . " " . $registro['paterno'] . " " . $registro['materno'] . "<br>";
	}

?>