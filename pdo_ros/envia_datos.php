<?php
 require_once 'imagen.php';
  
print_r($_POST); 
 $image = new imagen($_POST['nombre'], $_POST['apellido'], 2);
 $image->guardar();
 echo $image->getNombre() . ' se ha guardado correctamente con el id: ' . $image->getId();
?>