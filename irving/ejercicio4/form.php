<!DOCTYPE html>
<?php
	//echo $_COOKIE["user"] . " " . $_COOKIE["pass"] . "<br>";
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form enctype="multipart/form-data" action="sube_archivo.php" method="POST">
		<div>
			<label>Nombre:</label>
			<input type="text" name="nombre">
		<br>
		<br>
			<label >Identificacion:</label>
			<input type="file" name="archivo">
			<button type="submit">subir</button>
		</div>
	</form>
	<br>
	<form action="descarga_datos.php" method="post" accept-charset="utf-8">
		<div>
			<button type="submit">Obtener datos almacenados</button>
		</div>
	</form>
	<br>
	<form action="logout.php" method="post" accept-charset="utf-8">
		<div>
			<button type="submit">Logout</button>
		</div>
	</form>
</body>
</html>