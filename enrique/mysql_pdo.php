<?php
ini_set('display_errors', 1);
date_default_timezone_set("Mexico/General");

$bd = '';
function conectar(){
	return new PDO('mysql:host=127.0.0.1;dbname=test', "root", "12345678");
}

function lectura($bd){
	$qry = $bd->query('SELECT * FROM registros_e');
	while ($row = $qry->fetch()){
	    echo $row['nombre'] . " " . $row['paterno'] . " " . $row['materno'] . "<br>";
	}	
}

function insert($bd){
	$bd->exec("INSERT INTO registros_e (nombre, paterno ) VALUES ('Funcion_insert', '".strtotime(date("Y-m-d H:i:s"))."' ) ");
}

$bd = conectar();
insert($bd);
lectura($bd);
?>