<?php

session_start();
if (session_status() == PHP_SESSION_ACTIVE) { 
	session_destroy(); 
	setcookie("cookie_img", '',time()-3600 );

 echo "Se ha cerrado la sesion..."; }

 else{

 	echo "error al cerrar...";
 }?>