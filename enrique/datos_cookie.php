<?php
$datos = unserialize($_COOKIE['registro']);
echo "<pre>" . print_r($datos,true) . "</pre>";
?>
<br>
<hr>
<a href="form_cookie.php">Agregar cookie</a>
<br>
<a href="borrar_cookie.php">Borrar cookie</a>