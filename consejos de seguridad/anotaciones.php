===============================================
1. Protección contra la inyección de código SQL

mysql_query('select * from usuarios where username='.$_POST['username'].' AND password='.$_POST['password']);

$_POST['clave'] = "m' or 1='1"

foreach($_POST as $key=>value)
{
	$_POST[$key] = str_replace("'","",$value)
	$_POST[$key] = str_replace('"','',$value)
}

===============================================
2. Guardar contraseñas e emails en HASH md5 o SHA1

===============================================
3. Uso de Variables de Sesion Encriptadas y no de Cookies

===============================================
4. Proteger suplantación de Sesiones

session_start();
$_SESSION['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];

===============================================
5. Parámetros GET y POST explotables

http://www.e-commerce.com/index.ptp?idproducto=15