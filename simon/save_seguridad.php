<?php

function conectar_local() {
        $usuario = "root";
        $pass = "12345678";
        try{
             // $con = new PDO('mysql:host=localhost;dbname=prueba', $usuario, $pass);
            $s = new PDO('mysql:host=localhost;dbname=prueba',$usuario, $pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            return $s;
        }catch(PDOException $e) {
            echo 'Falló la Conexión: '.$e->getMessage();
        }
}

function valida_usuario(){
	foreach($_POST as $key=>$value){
		$_POST[$key] = str_replace("'","",$value);
		$_POST[$key] = str_replace('"','',$value);
	}
	$conn = conectar_local();
    $usuario = md5($_POST['usuario']);
    $pass = md5($_POST['pass']);
    $ip = $_SERVER['REMOTE_ADDR'];
    try{
        
        // $aux['error'] = ""
        $query = "INSERT INTO nombre (nombre,pass,ip) values('$usuario','$pass','$ip')";
        $result = $conn->query($query);
        if ($result->fetchColumn() > 0)
        {
            echo "se inserto la informacion de forma correcta";
        }
        $conn = null; //Para cerrar la conexión a la base de datos.
        return $aux;
    }catch(PDOException $e) {
        $aux['error'] = $e->getMessage(); //Mensaje de Error en la Consulta
        $aux['code'] = "-2"; //Error de Consulta            
        $conn = null; //Para cerrar la conexión a la base de datos.
        return $aux;
    }
}

valida_usuario($_POST);
echo "se inserto la informacion de forma correcta";

?>