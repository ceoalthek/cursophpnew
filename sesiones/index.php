SESSIONS
- Una manera de preservar la información de un usuario a través de un website.
- En una instalación de PHP las sesiones están soportadas por default.
- Las opciones de configuración se encuentran en el php.ini
- SID (String) es una constante predefinida

SESSION ID
- Se almacena en una Cookie en el lado cliente o en la URL.
- La variable $_SESSION está disponible de manera global
- Acción de seguridad session.use_only_cookies para forzar el uso de cookies y evitar usar SESSION ID en la URL.

FUNCIONES PREDEFINIDAS
session_destroy()
session_id()
session_start()

var_dump();

FORMS
- Recolector de datos de un usuario que navega una website.
- Los puntos y espacios en nombres de variables son convertidas en guiones bajos name="ejemplo x" será $_POST['ejemplo_x'], $_GET['ejemplo_x']

- Los inputs pueden ser introducidos en un array de la forma <input name="FormArray[]" /> y se leen de manera grupal con indices asignados.
- $_POST , $_GET Valores recomendados. $_REQUEST su uso no es recomendado.
- FILE UPLOADS el formulario debe contener como atributo enctype='multipart/form-data para que pueda funcionar correctamente.
				$_FILES ['filename'][.......]
				WHERE 
						['name']		LADO CLIENTE NOMBRE-DE-ARCHIVO
						['type']		TIPO DE ARCHIVO
						['size']		TAMAÑO DE ARCHIVO
						['error']		CÓDIGO DE ERROR DEL UPLOAD
						['tmp_name']	NOMBRE TEMPORAL DEL ARCHIVO EN LO QUE SE COLOCA EN EL 						SERVIDOR.



