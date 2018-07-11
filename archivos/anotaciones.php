Manejo de Archivos
==================

La función fopen(path,mode) permite abrir un archivo local o mediante un URL. El path del archivo debe incluir la ruta completa al mismo. El mode puede ser r - lectura,w - escritura,a - agregar, ox - escritura exclusiva. Se puede agregar un + al modo y si el archivo no existe, se intentará crear. La función fclose(file) cierra un puntero a un archivo abierto.

La función feof(file) comprueba si el puntero a un archivo se encuentra al final del archivo. La función fgets(file) obtiene una línea desde el puntero a un archivo. La función file_exists(file) comprueba si existe un archivo o directorio.

<?php

$path = "/var/www/html/cursophpnew/archivo.txt";
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

?>

La función fscanf analiza la entrada desde un archivo de acuerdo a un formato. Los tipos más importantes son: %d - entero, %f - flotante, y %s - string. Un detalle importante es que %s no reconoce hileras de texto con espacios en blanco, únicamente palabras completas.

<?php

$path = "/var/www/html/cursophpnew/archivo.txt";
if (!file_exists($path))
    exit("Archivo no encontrado");
$file = fopen($path, "r");
echo "<html><body><table border=1>";
echo "<tr><th>Pais</th><th>Código de Area</th><th>Info Primaria</th><th>Info Segunda</th></tr>";
while ($data = fscanf($file, "%s\t%d\t%d\t%f\n")) {
    list ($country, $area, $pop, $dens) = $data;
    echo "<tr><td>".$country."</td><td>".$area."</td><td>".
         $pop."</td><td>".$dens."</td></tr>";
}
echo "</table></body></html>";
fclose($file);

?>

Manejo de Directorios
=====================

La función is_dir indica si el nombre del archivo es un directorio y is_file indica si el nombre de archivo es realmente un archivo. La función mkdir crea un directorio. La función rename renombre un archivo o directorio. La función rmdir remueve un directorio y la función unlink remueve un archivo.

Archivos Binarios
------------------
Las funciones fread y fwrite leen y escriben, respectivamente, en un archivo en modo binario. La función fseek posiciona el puntero del archivo.

<?php

$path = "/var/www/html/cursophpnew/archivo";
if (!file_exists($path))
    exit("File not found");
$file = fopen($path, "r");
echo "<html><body><table border=1>";
echo "<tr><th>Pais</th><th>Area</th><th>Info Primaria</th><th>Info Secundaria</th></tr>";
fseek($file,35);
while ($data = fread($file, 35)) {
    $fields = explode("|",$data);
    echo "<tr><td>".$fields[0]."</td><td>".$fields[1]."</td><td>".
         $fields[2]."</td><td>".$fields[3]."</td></tr>";
}
echo "</table></body></html>";
fclose($file);

?>

Archivo de Texto
----------------

Otra forma de leer archivos de texto es utilizar la función file, la cual transfiere un archivo completo a un arreglo. Note que no es necesario abrir el archivo (fopen) para utilizar este función.

<?php

$path = "/var/www/html/cursophpnew/archivo.txt";
if (!file_exists($path))
    exit("Archivo no encontrado");
$rows = file($path);
array_shift($rows);
echo "<html><body><table border=1>";
echo "<tr><th>Pais</th><th>Código de Área</th><th>Info Primaria</th><th>Info Secundaria</th></tr>";
foreach ($rows as $row) {
    $fields = explode("|",$row);
    echo "<tr><td>".$fields[0]."</td><td>".$fields[1]."</td><td>".
         $fields[2]."</td><td>".$fields[3]."</td></tr>";
}
echo "</table></body></html>";

?>


Archivo CSV
-----------
La función fgetcsv obtiene una línea del puntero a un archivo y la examina para tratar campos CSV. La función fputcsv da formato a una línea como CSV y la escribe en un puntero a un archivo.

<?php

$path = "/var/www/html/cursophpnew/archivo.csv";
if (!file_exists($path))
    exit("Archivo no encontrado");
$file = fopen($path, "r");
echo "<html><body><table border=1>";
echo "<tr><th>Pais</th><th>Código de Área</th><th>Info Primaria</th><th>Info Secundaria</th></tr>";
while ($fields = fgetcsv($file,",")) {
    echo "<tr><td>".$fields[0]."</td><td>".$fields[1]."</td><td>".
         $fields[2]."</td><td>".$fields[3]."</td></tr>";
}
echo "</table></body></html>";
fclose($file);

?>

===================================================================================================
GLOSARIO DE TÉRMINOS
chdir() CAMBIA DE DIRECTORIO
chroot() CAMBIA EL ROOT DIRECTORIO
readdir() LEER UN DIRECTORIO
rmdir() BORRA UN DIRECTORIO

• FILE INFORMATION
finfo_open() CREA UN NUEVO PERFIL DE INFORMACIÓN DE ARCHIVO
finfo_file() REGRESA INFORMACIÓN DE UN ARCHIVO

• FILESYSTEM
basename() RETURNS FILENAME COMPONENT OF A PATH
chmod() CHANGES THE FILE MODE
copy() COPIES A FILE
file_exists() CHECKS IF A FILE OR DIRECTORY EXISTS
fpassthru() OUTPUTS ALL DATA OF A FILE HANDLE DIRECTLY TO THE OUTPUT BUFFER (STARTING AT THE CURRENT FILE POSITION)
fputcsv() WRITES DATA INTO A RESOURCE
fputs() 
rename() MOVES/RENAMES A FILE
unlink() DELETES A FILE
===================================================================================================
EJERCICIO MIÉRCOLES
- CONTINUANDO CON EL EJERCICIO ANTERIOR, 
- REALIZAR UNA CONSULTA DEL NOMBRE, APELLIDO Y LA IMAGEN A LA BASE DE DATOS… 
- PLASMAR LA INFORMACIÓN EN UN ARCHIVO DE TEXTO DIVIDIDO POR TABULADORES, 
    CERRARLO… 
- LEER EL ARCHIVO DE TEXTO
- CREAR UNA COOKIE CON LA INFORMACIÓN DE LA CONSULTA (NOMBRE, APELLIDO, IMAGEN) - ADICIONANDO NOMBRE DEL ARCHIVO DE TEXTO Y PLASMARLO EN LA COOKIE (PUEDE SER EN 
    UN ARRAY).
- DEJAR LA COOKIE PARA 15 DÍAS.
===================================================================================================


