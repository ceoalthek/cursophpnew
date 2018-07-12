<?php
    include("nusoap.php");

    $cliente = new nusoap_client("http://localhost/ejercicio5/server.php?wsdl",'wsdl');
      
    $error = $cliente->getError();
    if ($error) 
    {
        echo "<strong>Error desde la apertura</strong>".$error;
    }
      
    $datos = array(
        'username' => 'irving',
        'password' => '12345',
        'idCaptura' => 6
    );
    $result = $cliente->call("obtenerRegistros", array("datos" => json_encode($datos)));
      
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