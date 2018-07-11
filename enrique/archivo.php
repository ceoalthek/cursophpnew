<?php
function conecta(){
	$conexion = mysql_connect("127.0.0.1", "root", "12345678");
	$bd = mysql_select_db("test", $conexion);
}

function clean_txt(){
	$path = "personas.txt";
	if( file_exists($path) ){
		unlink($path);
	}
}

function check_datatable(){
	$consulta = "DROP TABLE IF EXISTS registros_e;";
	mysql_query($consulta);

	$consulta = "CREATE TABLE registros_e (
				  id int(11) NOT NULL AUTO_INCREMENT,
				  nombre varchar(255) DEFAULT NULL,
				  paterno varchar(255) DEFAULT NULL,
				  materno varchar(255) DEFAULT NULL,
				  imagen varchar(255) DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";
	mysql_query($consulta);

	$consulta = "INSERT INTO `registros_e` VALUES ('1', 'enrique', 'acevedo', 'catalan', 'imagen1.png'), ('2', 'Simon', 'Hernandez', 'Granados', 'imagen2.png'), ('3', 'Eniek', 'Leon', 'Vergara', null), ('4', 'Rosario', 'Rocha', '', null), ('5', 'Irvign', 'Rodriguez', 'Ozuna', null), ('6', 'Oscar', null, null, null);";
	mysql_query($consulta);
}

function generar_txt(){
	$consulta = "select * from registros_e";
	$ejecutar = mysql_query($consulta);
	// $resultado = mysql_fetch_array($ejecutar);

	$path = "personas.txt";
	$file = fopen($path, "w+");	
	while( $resultado = mysql_fetch_array($ejecutar) ){		
		fwrite($file, $resultado['nombre'] . "\t" . $resultado['paterno'] . "\t" . $resultado['paterno'] . "\t" . $resultado['imagen'] . PHP_EOL);
	}
	fclose($file);
}



function set_cookie(){
	$path = "personas.txt";
	$file = fopen($path, "r");	
	$registros = '';
	if( $file ){
		while ($data = fscanf($file, "%s\t%s\t%s\t%s\t%s\n")) {
		    list ($nombre, $paterno, $materno, $imagen) = $data;
		    $registros[] = array(
		    	"nombre" => $nombre,
		    	"paterno" => $paterno,
		    	"materno" => $materno,
		    	"imagen" => $imagen
		    );
		}
	    fclose($file);
	}

	echo json_encode($registros );
	echo "<pre>" . print_r($registros,true)."</pre>";
	

	setcookie("archivo", serialize(array('file' => "persona.txt")), ((time() + 3600) *24) * 15 );

	setcookie("registro", json_encode($registros), ((time() + 3600) *24) * 15 );

	echo "cookie generada<br>";
	// exit;
}


clean_txt(); // da de baja el archivo txt por si existe
conecta();
check_datatable();
generar_txt();
set_cookie();

header('Location: archivo2.php');