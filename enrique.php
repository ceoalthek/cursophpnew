<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

define('CONSTANT',1);
define('_CONSTANT',1);

define('EMPTY','');

echo EMPTY;
/*
if(!empty(EMPTY)){
	if(!(boolean) _CONSTANT){
		print "ONE!";
	}
}
else if(constant('CONSTANT') == 1){
	print "two2";
}
*/
?>