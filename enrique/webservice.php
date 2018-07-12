<?php
    include("nusoap/nusoap.php");

    function conectar()
    {
        try{
            $s = new PDO('mysql:host=10.3.2.27;dbname=dbsacppe', "prueba", "12345678",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
            return $s;
        }catch(PDOException $e) {
        	echo 'Falló la Conexión: '.$e->getMessage();
        }
    }

    function login($datos)
    {
        $conn = conectar();
        try{
            $query = sprintf("SELECT * FROM cPeriodo");
            $result = $conn->query($query);
            if ($result->fetchColumn() > 0)
            {
                $aux['error'] = ""; //Mensaje de Exito
                $aux['code'] = "0"; //Código de Exito
            }
            else
            {
                $aux['error'] = "¡Datos de Acceso Equivocados!"; 
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
      
    function consultar($id)
    {
        $conn = conectar();
        
        try{
            $query = sprintf("SELECT * FROM cPeriodo");
            $result = $conn->query($query);
            if ($result->rowCount() > 0)
            {
                while($row = $result->fetch())
                {
                    $aux['datos'][] = array(
                        'id'=>$row['idtPeriodo'],
                        'descripcion'=>$row['sDescripcion']
                    );
                }
                $aux['error'] = ""; //Mensaje de Error
                $aux['code'] = "0"; //Código de Exito
            }
            else
            {
                $aux['datos'] = "";
                $aux['error'] = "¡No hay registro con ese ID!"; 
                $aux['code'] = "-1";                
            }
        }catch(PDOException $e) {
            $aux['datos'] = "";
            $aux['error'] = $e->getMessage(); //Mensaje de Error en la Consulta
            $aux['code'] = "-2"; //Error de Consulta            
        }

        return $aux;
        $conn = null; //Para cerrar la conexión a la base de datos.        
    }

    function obtenerRegistros($datos) 
    {
        $datos = json_decode($datos,TRUE);

        $login = login($datos);

        if ($login['code']=="0")
        {
            $respuesta['datos'] = consultar($datos['idregistro']);
            $respuesta['codigo'] = "0";
            $respuesta['mensaje'] = "";
        }
        else if ($login['code']=="-1")
        {
            $respuesta['datos'] = "";
            $respuesta['codigo'] = "-1";
            $respuesta['mensaje'] = $login['error'];
        }
        else if ($login['code']=="-2")
        {
            $respuesta['datos'] = "";
            $respuesta['codigo'] = "-2";
            $respuesta['mensaje'] = $login['error'];            
        }

        return json_encode($respuesta);            
    }
      
    $server = new soap_server();
    $server->configureWSDL("registros", "urn:registros");


    $server->register("obtenerRegistros",
        array("datos" => "xsd:string"),
        array("return" => "xsd:string"),
        "urn:registros",
        "urn:registros#obtenerRegistros",
        "rpc",
        "encoded",
        "Propociona los registros de una tabla");

    $server->register("insertarRegistros",
        array("datos" => "xsd:string"),
        array("return" => "xsd:string"),
        "urn:registros",
        "urn:registros#insertarRegistros",
        "rpc",
        "encoded",
        "Inserta los registros de una tabla");
    

    ####
    #### NUEVO
    ####
    
    function insertarRegistros($data){
    	/*
    	$respuesta['datos'] = "Insertado";
        $respuesta['codigo'] = "0";
        $respuesta['mensaje'] = "";

        $conn = conectar();
        */

        // $conn->exec("INSERT INTO cPeriodo (idtPeriodo, sDescripcion ) VALUES (null, '".strtotime(date("Y-m-d H:i:s"))."' ) ");

    	return json_encode($data);	
    }

   	// $server->configureWSDL("inserta", "urn:inserta");
   	
    

    


    $server->service($HTTP_RAW_POST_DATA);

?>