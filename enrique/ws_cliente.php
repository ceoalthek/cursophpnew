<?php
include("nusoap/nusoap.php");

$cliente = new nusoap_client("http://10.3.2.27/webservice/webservice.php?wsdl",'wsdl');

$error = $cliente->getError();
    if ($error) 
    {
        echo "<strong>Error desde la apertura</strong>".$error;
    }
      
    $datos = array(
        'username' => 'admin',
        'password' => '9542931e640c671a60ea44a954b249c179da12391',
        'idregistro' => 6
    );
    //$result = $cliente->call("obtenerRegistros", array("datos" => json_encode($datos)));
    $result = $cliente->call("insertarRegistros", array("datos" => json_encode($datos)));
      
    if ($cliente->fault) {
        echo "Fault: ";
        echo $result;
    }
    else {
        $error = $cliente->getError();
        if ($error) {
            echo "Error 2: ".$error;
        }
        else {
            echo "Resultado de Consulta: <br/>";
            echo $result;
        }
    }
?>