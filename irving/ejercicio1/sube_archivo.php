<!DOCTYPE html>
<?php
// En versiones de PHP anteriores a la 4.1.0, debería utilizarse $HTTP_POST_FILES en lugar
// de $_FILES.
$dir_subida = 'archivos/';
$fichero_subido = $dir_subida . basename($_FILES['archivo']['name']);

echo '<pre>';
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
    echo "El fichero es válido y se subió con éxito.\n";
} else {
    echo "¡Posible ataque de subida de ficheros!\n";
}

echo 'Más información de depuración:';
print_r($_FILES);

print "</pre>";

?>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="form.php" method="post" accept-charset="utf-8">
		<div>
			<button type="submit" href>regresar</button>
		</div>
	</form>
</body>
</html>