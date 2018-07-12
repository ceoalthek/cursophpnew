<?php
 require_once 'login.php';
  
print_r($_POST); 
 
	 
	$user = str_replace("'","",$_POST['user']);
	$passw = str_replace('"','',$_POST['passw'] );
 
  
 
 $login = new login($user, $passw,6);
 $login->guardar();

 echo '<br>'. $login->getUser() . ' <br>Se ha iniciado la sesion con el ID: ' . $login->getId();
?>