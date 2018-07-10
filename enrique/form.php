<?php 
session_start();
print_r($_SESSION);
if( isset($_SESSION['imagen']) ){
	if( $_SESSION['imagen'] != 1 ){
		$_SESSION['imagen'] = FALSE;
	}else{
		$_SESSION['imagen'] = 1;
	}
}else{
	$_SESSION['imagen'] = FALSE;
}

if(isset($_GET['borrar'])){
	$_SESSION['datos'] = '';
	session_destroy();
}

if(isset($_POST['nombre'])){
	$_SESSION['datos'] = array(
		"nombre" => $_POST['nombre'][0],
		"paterno" => $_POST['paterno'][0],
		"materno" => $_POST['materno'][0]
	);
}

$muestra_form = true;

if(isset($_SESSION['datos'])){
	if( is_array($_SESSION['datos'])){
		$muestra_form = false;
		echo "La sesion almacenada es: <br>";	
		echo "<pre>" . print_r($_SESSION['datos'], true) . "</pre><hr>";

		echo "Limpiar session ";
		?>
		<a href="?borrar=1">pulse aqui</a>
		<br>
		<br>
		<br>
		<?php 
		if(is_array($_FILES)){
			if(isset($_FILES['archivo'])){
				
				$target_file = "imagen.png";
				// echo "carpeta temporal: " . $_FILES["archivo"]["tmp_name"] . "<br>";
				// echo "Nombre archivo: " . $_FILES["archivo"]["name"] . "<br>";
				// echo __DIR__;
				if(file_exists($target_file)){
					unlink($target_file);
				}

				if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)){
					echo "SUBIO";
					$_SESSION['imagen'] = 1;
				}else {
				    // echo "¡Posible ataque de subida de ficheros!\n";
				}
			}

		}
	}
}
?>
<?php 
if($muestra_form){
	?>
	<form action="form.php" method="post" accept-charset="utf-8">
		<label>Nombre</label>
		<input type="text" name="nombre[]">
		<br>
		<label>Ap. Paterno</label>
		<input type="text" name="paterno[]">
		<br>
		<label>Ap. Materno</label>
		<input type="text" name="materno[]">
		<br>
		<input type="submit" value="Enviar">
	</form>
	<hr>
	<?php 
}else{
	?>
	<form action="form.php" method="post" enctype="multipart/form-data">
		<label>Sube una imagen</label>
		<input type="file" name="archivo">
		<input type="submit" value="Enviar">
	</form>
	<?php
	if($_SESSION['imagen']){
		?>
		hols
		<img src="imagen.png">
		<?php 
	}
}
?>