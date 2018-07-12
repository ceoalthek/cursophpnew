<?php
    include("nusoap.php");

    $cliente = new nusoap_client("https://127.0.0.1/curso/server.php?wsdl",'wsdl');
      
    $error = $cliente->getError();
    if ($error) 
    {
        echo "<strong>Error desde la apertura</strong>".$error;
    }
      
    $datos = array(
        'username' => 'admin',
        'password' => '9542931e640c671a60ea44a954b249c179da12391',
        'idregistro' => 2
    );
    $result = $cliente->call("obtenerRegistros", array("datos" => json_encode($datos)));

    //$result = $cliente->call("consultarNombre", array("datos" => "Oscar"));
      
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
            echo $result."<br>";
        }
    }

    $datos = array(
        'username' => 'admin',
        'password' => '9542931e640c671a60ea44a954b249c179da12391',
        'nombre' => "ENIEK"
    );
    $result = $cliente->call("obtienexname", array("datos" => json_encode($datos)));
      
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
            echo "Resultado de Consulta dos: <br/>";
            echo $result;
        }
    }
?>