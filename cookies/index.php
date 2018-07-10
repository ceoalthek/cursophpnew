<?php 
	$array = array('nombre'=>'Oscar Garcés','birthday'=>'03021975');
	setcookie("infocliente", serialize($array), time()+3600);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<title>Cookies</title>
</head>
<body>
	<?php $datos = unserialize($_COOKIE['infocliente']); var_dump($datos); ?>
</body>
</html>