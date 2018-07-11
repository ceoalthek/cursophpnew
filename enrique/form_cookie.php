<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario de nombre</title>
</head>
<body>
	<form action="save_form.php" method="post" enctype="multipart/form-data">
		<label>Nombre</label>
		<input type="text" name="nombre[]">
		<br>
		<label>Ap. Paterno</label>
		<input type="text" name="paterno[]">
		<br>
		<label>Ap. Materno</label>
		<input type="text" name="materno[]">
		<br>
		<label>Sube una imagen</label>
		<input type="file" name="archivo">
		<br>
		<input type="submit" value="Enviar">
	</form>
</body>
</html>