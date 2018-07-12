<?php
    include("nusoap.php");

    $cliente = new nusoap_client("http://10.3.2.27/wsIrving/server_irving.php?wsdl",'wsdl');
      
    $error = $cliente->getError();
    if ($error) 
    {
        echo "<strong>Error desde la apertura</strong>".$error;
    }
    /*
    $datos = array(
        'username' => 'irving_',
        'password' => '25d55ad283aa400af464c76d713c07ad',
        'idCaptura' => 112681
    );
    $result = $cliente->call("obtenerRegistros", array("datos" => json_encode($datos)));
    */
    $datos = array(
        'username' => 'irving_',
        'password' => '25d55ad283aa400af464c76d713c07ad',
        'idCaptura' => 214582
    );
    $result = $cliente->call("consultarPersonas", array("datos" => json_encode($datos)));



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