<?php
    include("nusoap.php");

    $cliente = new nusoap_client("http://192.168.33.22/cursophpnew/simon/webservice/servidor.php?wsdl",'wsdl');
      
    $error = $cliente->getError();
    if ($error) 
    {
        echo "<strong>Error desde la apertura</strong>".$error;
    }
      
    $datos = array(
        'nombre' => 'NOE',
        'paterno' => 'ENRRIQUE',
        'materno' => "SON NOVIOS"
    );
    //$result = $cliente->call("get_datos", array("datos" => json_encode($datos)));

    $result = $cliente->call("insert_datos", array("datos" => json_encode($datos))); 
    if ($cliente->fault) {
        echo "Fault: ";
        echo $result;
    }
    else {
        $error = $cliente->getError();
        if ($error) {
            echo "Error ".$error;
        }
        else {
            echo "Resultado de Consulta: <br/>";
            echo $result;
        }
    }
?>