<!DOCTYPE html>
<?php
	//echo $_COOKIE["user"] . " " . $_COOKIE["pass"];
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
		<br>
	</form>
	<form action="logout.php" method="get" accept-charset="utf-8">
		<div>
			<button type="submit">Logout</button>
		</div>
	</form>
</body>
</html>