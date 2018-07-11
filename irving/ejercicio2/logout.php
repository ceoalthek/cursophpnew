<!DOCTYPE html>
<?php
	function logout(){
		setcookie("user", "", time() - 3600);
		setcookie("pass", "", time() - 3600);
		echo $_COOKIE["user"] . " " . $_COOKIE["pass"];
		header("Location: http://" . $_SERVER['HTTP_HOST'] . "/ejercicio2");
	}
	
	logout();
?>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
