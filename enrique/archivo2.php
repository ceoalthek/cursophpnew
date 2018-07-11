<?php
function leer_txt(){
	$path = "personas.txt";
	$file = fopen($path, "r");	
	if( $file ){
		echo "<html><body><table border=1>";
		echo "<tr><th>Nombre</th><th>Paterno</th><th>Materno</th><th>Imagen</th></tr>";
		while ($data = fscanf($file, "%s\t%s\t%s\t%s\t%s\n")) {
		    list ($nombre, $paterno, $materno, $imagen) = $data;
		    echo "<tr><td>$nombre</td><td>$paterno</td><td>$materno</td><td>$imagen</td></tr>";
		}
		echo "</table></body></html>";
	    fclose($file);
	}
}

leer_txt();

echo "<hr>";

echo "Valor COOKIE";
echo "<pre>" . print_r($_COOKIE,true) . "</pre>";

print_r( unserialize($_COOKIE['registro']));

$dat = $_COOKIE['registro'];
$data=unserialize($dat);
foreach($data as $key => $vl)
{ 
   echo $key.' : '.$vl.'<br>';
}
?>