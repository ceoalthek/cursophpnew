<?php 

	echo preg_replace_callback('~-([a-z])~', function ($coincidencia) {
	    return strtoupper($coincidencia[1]);
	}, 'hola-mundo');


	$saludo = function($nombre)
	{
	    printf("Hola %s\r\n", $nombre);
	};

	$saludo('Mundo');
	$saludo('PHP');
 
 ?>