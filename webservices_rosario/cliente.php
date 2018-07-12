<?php
    include("nusoap.php");

    $cliente = new nusoap_client("http://localhost/webservices/server.php?wsdl",'wsdl');
      
    $error = $cliente->getError();
    if ($error) 
    {
        echo "<strong>Error desde la apertura</strong>".$error;
    }
      
    $datos = array(
        'username' => 'admin',
        'password' => '9542931e640c671a60ea44a954b249c179da12391',
        'id' => 12
    );
     // print_r($datos); 
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
            echo "Resultado de Loguearse: <br/>";
            echo $result;
        }
    }


     $imagenes = $cliente->call("obtener_img", array("datos" => json_encode($datos)));
     
    
    if ($cliente->fault) {
        echo "Fault: ";
        echo $imagenes;
    }
    else {
        $error = $cliente->getError();
        if ($error) {
            echo "Error ".$error;
        }
        else {
            echo " <br/> Resultado de Consultar Imagenes: <br/>";
            echo $imagenes;
        }
    }
?>