<?php 	
	session_start();
	if(count($_POST) > 1){
		$_SESSION['nombre'] = $_POST['nombre'][0];
		$_SESSION['paterno'] = $_POST['paterno'][0];
		$_SESSION['materno'] = $_POST['materno'][0];
	}
	
	if($_FILES){
		$target_path ='simon';
		$url = $target_path .  $_FILES['archivo']['name'];
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $url)){
		    echo 'se movio';
		 }
		 session_destroy();
	}
	header('Location: /cursophpnew/simon/index.php');
?>