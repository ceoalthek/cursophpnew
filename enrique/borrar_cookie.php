<?php
function borrar_cookie(){
	setcookie("registro", serialize(array()), time()-3600);

	//unset ($_COOKIE ["registro"]);
}

borrar_cookie();


header('Location: datos_cookie.php');
?>