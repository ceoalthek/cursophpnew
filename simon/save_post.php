<?php 	
// conexion a la base de datos
	if(isset($_GET['valor'])){
		if($_GET['valor'] == 1) recupera_datos();
		if($_GET['valor'] == 2) cokie();
		header('Location: /cursophpnew/simon/index.php');
	}
	$con = new mysqli('localhost','root','12345678', 'prueba');
	if($con->connect_error){
		// die("Fallo la conexion: ",$con->connect_error);
		echo "fallo conexion";
	}	
	if(count($_POST) > 1){
		$nombre = $_POST['nombre'][0];
		$paterno = $_POST['paterno'][0];
		$materno = $_POST['materno'][0];
		$query = "INSERT INTO nombre (nombre,paterno,materno) values('$nombre','$paterno','$materno')";	
		if($con->query($query) === TRUE){
			echo 'se guardo la info';
		}else{
			echo $query;
			echo "Error";

		}	
	}
	
// fin concexion de base de datos	
	session_start();
	if(count($_POST) > 1){
		$_SESSION['nombre'] = $_POST['nombre'][0];
		$_SESSION['paterno'] = $_POST['paterno'][0];
		$_SESSION['materno'] = $_POST['materno'][0];
	}
	
	if($_FILES){
		$url = $_FILES['archivo']['name'];
		echo $url;
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $url)){
		    echo 'se movio';
		 }else{
		 	echo "no se movio";
		 }

		 session_destroy();
	}
	header('Location: /cursophpnew/simon/index.php');



function recupera_datos(){
	$con = new mysqli('localhost','root','12345678', 'prueba');
	if($con->connect_error){
		// die("Fallo la conexion: ",$con->connect_error);
		echo "fallo conexion";
	}	
	$query = "SELECT * FROM nombre limit 1";	
	$result = $con->query($query);
	if($result->num_rows > 0){
		$data = $result->fetch_assoc();
		$cokie = array('nombre'=>$data['nombre'],'paterno'=>$data['paterno'], 'materno'=>$data['materno']);
		setcookie("ejercicio", serialize($cokie), time()+3600);
	}
}

function cokie(){
	setcookie("ejercicio",serialize(array()), time()-3600);
	unset($_COOKIE["ejercicio"]);
}
?>


<!-- por medio de kukies, 

formulario guardar en base de datos, 
recuperar la informacion y mostrarla en la kokie
poner un boton de borra kokie. -->

