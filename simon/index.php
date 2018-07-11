<?php 
	session_start(); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>
		Ejercicio
	</title>
	<style type="text/css">
	</style>
</head>
<body>

	<form name = "ejercicio" action="save_post.php" method="post" role="form" enctype ="multipart/form-data"> 
		<label>
			Nombre: 
		</label>
		<input type="text" name="nombre[]">
		<br>
		<label>
			Paterno: 
		</label>
		<input type="text" name="paterno[]">
		<br>
		<label>
			Materno: 
		</label>
		<input type="text" name="materno[]">
		<br>
		<?php if(count($_SESSION)>1){ ?>
		<label>
			Archivo: 
		</label>
		<input type="file" name="archivo">
		<br>
		<br>
		<button type="submit">
			Guardar imagen y salir
		</button>
		<?php }else{ ?>
		<button type="submit">
			Enviar
		</button>
		<?php } ?>

		<br>
		<?php if(!isset($_COOKIE['ejercicio'])){ ?>
		<a type="button" href="save_post.php?valor=1">
			recuperar informacion guardada y cear kokie
		</a>
		<?php } else{ ?>
		<a type="button" href="save_post.php?valor=2">
			eliminar kokie
		</a>
		<?php } ?>

	</form>
	<br>
	<br>
	<?php if(isset($_SESSION)){ ?>
	<table>
		<thead>
			<tr>
				<th>
					Nombre
				</th>
				<th>
					Paterno
				</th>
				<th>
					Materno
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<?php echo  $_SESSION['nombre']; ?>
				</td>
				<td>
					<?php echo  $_SESSION['paterno']; ?>
				</td>
				<td>
					<?php echo  $_SESSION['materno']; ?>
				</td>
			</tr>
		</tbody>
	</table>
	<br>
	<br>
	<?php } 
	if(isset($_COOKIE['ejercicio'])){
		$datos = unserialize($_COOKIE['ejercicio']); 
		echo "Esta es la informacio de la cokie <br><br>";

		print_r($datos);
		echo "<br>";
	}


	?>
</body>
</html>


<?php 



?>