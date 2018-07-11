<?php

session_start();
if (session_status() == PHP_SESSION_ACTIVE) { 
	session_destroy(); 
	setcookie("cookie_img", '',time()-3600 );
	setcookie("cookie_imagen", '',time()-(60*60*24*15) );

 echo "Se ha cerrado la sesion..."; }

 else{

 	echo "error al cerrar...";
 }?>