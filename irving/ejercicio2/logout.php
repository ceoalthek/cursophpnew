<!DOCTYPE html>
<?php
	function logout(){
		setcookie("user", "", time() - 3600);
		setcookie("pass", "", time() - 3600);
		header("Location: http://env.local.com/cursophpnew/irving/ejercicio2/login.php");
	}
	
	logout();
	//echo $_COOKIE["user"] . " " . $_COOKIE["pass"];
?>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
