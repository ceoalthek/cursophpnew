<?php
    include("nusoap.php");

    function conectar()
    {
        $usuario = "sistemas_dev";
        $pass = "S1stemD3v";
        try{
             // $con = new PDO('mysql:host=localhost;dbname=prueba', $usuario, $pass);
            $s = new PDO('mysql:host=10.3.2.27;dbname=sacppe_precarga',$usuario, $pass,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            return $s;
        }catch(PDOException $e) {
            echo 'Falló la Conexión: '.$e->getMessage();
        }
    }

function conectar_local()
    {
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


    function get_cct($datos)
    {
        $conn = conectar();
        
        try{
            $query = sprintf("SELECT tcenCCT FROM tCct WHERE tcenCCT ='12DTV0564G'");
            $result = $conn->query($query);
            if ($result->rowCount() > 0){
                while($row = $result->fetch())
                {
                    $aux['datos'] = array(
                        'nombre'=>$row['tcenCCT']
                    );
                }
                $aux['error'] = ""; //Mensaje de Error
                $aux['code'] = "0"; //Código de Exito
            }else{
                $aux['datos'] = "";
                $aux['error'] = "¡No hay registro con ese ID!"; 
                $aux['code'] = "-1";                
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
    function insert_info($datos){

        $conn = conectar_local();

        $nombre = $datos['nombre'];
        $paterno = $datos['paterno'];
        $materno = $datos['materno'];
        try{
            // $aux['error'] = ""
            $query = "INSERT INTO nombre (nombre,paterno,materno) values('$nombre','$paterno','$materno')";
            $result = $conn->query($query);
            if ($result->fetchColumn() > 0)
            {
                $aux['error'] = ""; //Mensaje de Exito
                $aux['code'] = "0"; //Código de Exito
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


    function get_datos($datos) {
        $respuesta['datos'] = get_cct();
        $respuesta['codigo'] = "1000";
        $respuesta['mensaje'] = "jajajajaja";
        return json_encode($respuesta);          
    }
    function insert_datos($datos) {
        $datos = json_decode($datos,TRUE);
        $respuesta['datos'] = insert_info($datos);

        $respuesta['datos'] = "jajaj";
        $respuesta['codigo'] = "1000";
        $respuesta['mensaje'] = "aaajjjjuuuuuuaaa";
        return json_encode($respuesta);          
    }
      
    $server = new soap_server();
    // $server->configureWSDL("registros", "urn:registros");
    // $server->register("obtenerRegistros",
    //     array("datos" => "xsd:string"),
    //     array("return" => "xsd:string"),
    //     "urn:registros",
    //     "urn:registros#obtenerRegistros",
    //     "rpc",
    //     "encoded",
    //     "Propociona los registros de una tabla");


    $server->configureWSDL("registros", "urn:registros");
    $server->register("get_datos",
        array("datos" => "xsd:string"),
        array("return" => "xsd:string"),
        "urn:registros",
        "urn:registros#get_datos",
        "rpc",
        "encoded",
        "Propociona los registros de una tabla");

    $server->register("insert_datos",
        array("datos" => "xsd:string"),
        array("return" => "xsd:string"),
        "urn:registros",
        "urn:registros#insert_datos",
        "rpc",
        "encoded",
        "Propociona los registros de una tabla");


    // if(!isset($HTTP_RAW_POST_DATA)){
    //     $HTTP_RAW_POST_DATA = file_get_contents("php://input");
    // }
    $server->service($HTTP_RAW_POST_DATA);

?>