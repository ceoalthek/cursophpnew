<?php
//Ejercicio 1
define('CONSTANT',1);
define('_CONSTANT',0);

define('EMPTY', '');

if(!empty(EMPTY)){
	if (!((boolean)_CONSTANT)) {
		print "One";
	}
}
else if (constant('CONSTANT')==1) {
	print "Two";
}


//Ejercicio 2
function fibonacci ($x1, $x2){
	return $x1+$x2;
}

$x1=0;
$x2=1;
for ($i=0; $i <10 ; $i++) { 
	echo fibonacci($x1,$x2).',';
}

//Ejercicio 3
$a=1;
	++$a;
	$a*=$a;
	echo $a--;

?>

