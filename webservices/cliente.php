<?php
    include("nusoap.php");

    $cliente = new nusoap_client("https://tecnologiasdealtamira.com/edu/server.php?wsdl",'wsdl');
      
    $error = $cliente->getError();
    if ($error) 
    {
        echo "<strong>Error desde la apertura</strong>".$error;
    }
      
    $datos = array(
        'username' => 'admin',
        'password' => '9542931e640c671a60ea44a954b249c179da1239',
        'idregistro' => 1
    );
    $result = $cliente->call("obtenerRegistros", array("datos" => json_encode($datos)));
      
    //$xml = new SimpleXMLElement($result);

    var_dump($result);
    exit;

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