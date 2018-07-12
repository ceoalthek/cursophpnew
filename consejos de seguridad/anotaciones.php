===============================================
1. Protección contra la inyección de código SQL

mysql_query('select * from usuarios where username='.$_POST['username'].' AND password='.$_POST['password']);

$_POST['clave'] = "m' or 1='1"

foreach($_POST as $key=>value)
{
	$_POST[$key] = str_replace("'","",$value)
	$_POST[$key] = str_replace('"','',$value)
}

Certificados SSL
- DV Domain Validation
- OV Operation Validation
- EV Extended Validation

===============================================
2. Guardar contraseñas e emails, usernames en HASH md5 (32 caracteres) o SHA1 (40 caracteres)

===============================================
3. Uso de Variables de Sesion Encriptadas y no de Cookies (cuando es necesario que utilicemos sesiones)


===============================================
4. Proteger suplantación de Sesiones

session_start();
$_SESSION['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR']; //IP del visitante
$_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT']; //Explorador de Internet


===============================================
5. Parámetros GET y POST explotables

http://www.e-commerce.com/index.ptp?idproducto=15 Dirija a un 404 si yo edito la URL

===============================================
EJERCICIO
- Formulario de Login (username, password)
- Hash (md5 o sha1) de ambos fields
- Ingrese a la DB la IP del visitante y el Explorador de Internet
- Elimine apóstrofes o dobles comillas de los inputs
- Puede utilizar PDO o Consultas MySQL Estándar




