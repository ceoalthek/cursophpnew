
// Las cookies deben crearse o destruirse antes de enviar ningún carácter al navegador (por ejemplo como el header).

// Para crear una cookie, se utiliza la función setcookie

setcookie("nombreCookie", valorCookie, momentoDestruccion);

// nombreCookie es el nombre con que identificará a la cookie.
//    Los nombres de cookie no deben coincidir con los nombres de los controles de los formularios
// valorCookie es el valor que se guarda en la cookie
// momentoDestruccion es el momento en que se borrará automáticamente la cookie,
//    expresado como tiempo Unix. Para calcularlo se suele utilizar la expresion
//    time()+$duracion donde $duracion es el número de segudos que debe
//    permancer la cookie en el ordenador del cliente
//    Si se omite, la cookie se borrará al cerrar el navegador

// Los valores de las cookies se pueden consultar en cualquier página
// del mismo dominio y se almacenan en la matriz $_COOKIE y en $_REQUEST
// (por eso no deben coincidir los nombres de las cookies con los de los controles de los formularios)

$dato = $_COOKIE["nombreCookie"];

// Para borrar una cookie, basta con volver a crear la cookie con un tiempo anterior al actual

setcookie(nombreCookie, valorCookie, time() - 3600);


name
El nombre de la cookie.

value
El valor de la cookie. Este valor se guarda en la computadora del cliente; no almacene información sensible. Asumiendo que el name es 'cookiename', este valor se obtiene con $_COOKIE['cookiename'].

expire
El tiempo en el que expira la cookie. Es una fecha Unix por tanto está en número de segundos a partir de la presente época. En otras palabras, probablemente utilizará la función time() más el número de segundos que quiere que dure la cookie. Si se omite, la cookie expirará al final de la sesión (al cerrarse el navegador).

path
La ruta dentro del servidor en la que la cookie estará disponible. Si se utiliza '/', la cookie estará disponible en la totalidad del domain. Si se configura como '/carpeta/', la cookie sólo estará disponible dentro del directorio /carpeta/ y todos sus sub-directorios en el domain, tales como /carpeta/subcarpeta/. El valor por defecto es el directorio actual en donde se está configurando la cookie.

domain
El dominio para el cual la cookie está disponible. Establecer el dominio a 'www.example.com' hará que la cookie esté disponible en el subdominio www y subdominios superiores. Las cookies disponibles en un dominio inferior, como 'example.com', estarán disponibles en dominios superiores, como 'www.example.com'. 

secure
Indica que la cookie sólo debiera transmitirse por una conexión segura HTTPS desde el cliente. Cuando se configura como TRUE, la cookie sólo se creará si es que existe una conexión segura. Del lado del servidor, depende del programador el enviar este tipo de cookies solamente a través de conexiones seguras (por ejemplo, con $_SERVER["HTTPS"]).

httponly
Cuando es TRUE la cookie será accesible sólo a través del protocolo HTTP. Esto significa que la cookie no será accesible por lenguajes de scripting, como JavaScript. Se ha indicado que esta configuración ayuda efectivamente a reducir el robo de identidad a través de ataques XSS (aunque no es soportada por todos los navegadores). pero esa afirmación se disputa a menudo. Agregado en PHP 5.2.0. Puede ser TRUE o FALSE
