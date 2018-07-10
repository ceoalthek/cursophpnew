<?php
/*
Funciones:
	func_num_args : Numero total de argumentos
	func_get_arg : devuelve el valor del indice que se le indique
	func_get_args :  devuelve un array con todos los argumentos
 */
function numero_argumentos(){
	$numargs  = func_num_args();
	echo "numero de argumento: $numargs <br>";
}

function muestra_argumentos(){
	$numargs  = func_num_args();
	$arg_list = func_get_args();
	for($x=0; $x< $numargs; $x++){
		echo "El argumento $x es : " . $arg_list[$x] . " <br>";
	}
}

numero_argumentos(1,2,4);
muestra_argumentos(1,23,54);

/*
- Escriba un formulario que solicite nombres y los almacene en una sesión hasta que el usuario cierre la sesión, es necesario subir su identificación oficial.
- El formulario contiene un campo para escribir un nombre (una o varias palabras).
- El formulario muestra los nombres que se han escrito anteriormente.
- La página contiene un enlace para cerrar la sesión.
*/
?>