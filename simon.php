<?php 
	// $a = 1;
	// ++$a;
	// $a * = $a;
	// echo $a--;

  ?>



<?php 
define('CONSTANT',1);
define('_CONSTANT',0);
define('EMPTY','');


if( !empty(EMPTY)){
	if (!((boolean) _CONSTANT)){
		print "ONE";
	}
}else if(constant('CONSTANT') == 1){
	print "2";
}
  ?>