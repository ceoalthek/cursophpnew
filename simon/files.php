<!DOCTYPE html>
<html>
<head>
	<title>Ejercicio de Files</title>
</head>
<body>
	<form name = "files" action="get_info_files.php" method="post" role="form">
		<button type="submit">
			consultar y generar archivo
		</button>	
		<br>
		<br>
		<a href="get_info_files.php?valor=1">
			leer archivo de texto
		</a>
	</form>
	

</body>
</html>
<?php
if(isset($_COOKIE['file'])){
	$datos = unserialize($_COOKIE['file']); 
	echo "Esta es la informacio de la cokie <br><br>";

	print_r($datos);
	echo "<br>";
}

?>