<?php 
	session_start();
	$_SESSION['usuario'] = $_POST['usuario'];
	$_SESSION['pass'] = $_POST['pass'];
	//echo $_SESSION['usuario'] . " " . $_SESSION['pass'];
	header("Location: http://" . $_SERVER['HTTP_HOST'] . "/ejercicios/form.php");
?>