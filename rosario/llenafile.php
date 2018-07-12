<?php 


llenar_file();

echo "Se lleno el archivo de texto, con el nombre de la imagen...<br>";

leer_file();
echo "<pre>Este es el archivo on Read! </pre>";

echo "<br>";
echo "\n";

echo "<button id='terminar' ><a href='http://localhost/cursophp/close.php'>Cerrar la sesion </a></button> "; 


function llenar_file(){

    // $path = "/var/www/html/cursophpnew/archivo.txt";
    $path = 'C:\xampp\htdocs\cursophp\archivo.txt';

    //if (!file_exists($path))
    //  exit("Archivo no encontrado");
    $file = fopen($path, "w");
    if ($file) {
       // $fp = fopen('data.txt', 'w');
       // leer la base de datos y llenar el archivo
        $mysqli = new mysqli('127.0.0.1', 'root', '', 'test');
        $mysqli->set_charset("utf8");
        
        $sql = "SELECT * FROM imagen";  

        $resultado = $mysqli->query($sql);
        echo "<table border='1'><tr><td> NOMBRE</td> <td> APELLIDO</td> <td> IMAGEN SUBIDA</td></tr>";
        while($f = $resultado->fetch_object()){
            echo "<tr><td>";
            echo $f->nombre.' </td> <td>' .  $f->apellido .' </td> <td>' .  $f->imagen_name ;
            echo "</td></tr>";
            fwrite($file, chr(9). $f->nombre);
            fwrite($file, chr(9). $f->apellido);
            fwrite($file, chr(9). $f->imagen_name);

            $datos_cookie[]= array(
                'nombre' => $f->nombre,
                'apellido' => $f->apellido,
                'file' =>$f->imagen_name
        
            );
                
                setcookie("cookie_imagen", serialize($datos_cookie),time()+(60*60*24*15) );        
               
    
        }
        echo "</table>";

        $cookie_get = unserialize($_COOKIE['cookie_imagen']);         
         
        fclose($file);

        echo "Esta es la cookie con la info. ";
        echo "<pre>" . print_r($cookie_get,true) . "</pre>";
 
        echo "<br>";
        echo "\n";
         
    }
}

    function leer_file(){

     // $path = "/var/www/html/cursophpnew/archivo.txt";
     $path = 'C:\xampp\htdocs\cursophp\archivo.txt';

            if (!file_exists($path))
                exit("Archivo no encontrado");
            $file = fopen($path, "r");
            if ($file) {
                while (($line = fgets($file)) !== false) {
                    echo $line;
                }
                if (!feof($file)) {
                    echo "Error: EOF no encontrado\n";
                }
                fclose($file);
            }

    }

   

?>