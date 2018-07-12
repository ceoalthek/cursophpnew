<?php
ini_set('display_errors', 1);
date_default_timezone_set("Mexico/General");

$bd = '';
function conectar(){
	try{
	    return new PDO('mysql:host=127.0.0.1;dbname=test', "root", "12345678");
	}catch(PDOException $e){
	    echo "ERROR: " . $e->getMessage();
	}


	
}

function lectura($bd){
	try{
		$qry = $bd->query('SELECT * FROM registros_e');
		while ($row = $qry->fetch()){
		    echo $row['nombre'] . " " . $row['paterno'] . " " . $row['materno'] . "<br>";
		}
	}catch(PDOException $e){
	    echo "ERROR EN LECTURA: " . $e->getMessage();
	}
}

function insert($bd){
	try{
		$bd->exec("INSERT INTO registros_e (nombre, paterno ) VALUES ('Funcion_insert', '".strtotime(date("Y-m-d H:i:s"))."' ) ");
	}catch(PDOException $e){
	    echo "ERROR EN EL INSERT: " . $e->getMessage();
	}
}

$bd = conectar();
insert($bd);
lectura($bd);
?>