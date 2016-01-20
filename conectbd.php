<?php
$servidor = "localhost"; 
$usuario = "root"; 
$contrasenha = "root"; 
$BD = "hquotes"; 

$conexion = @mysql_connect($servidor, $usuario, $contrasenha);
 

if (!$conexion) {
    die('<strong>No pudo conectarse:</strong> ' . mysql_error());
}else{
}

mysql_select_db($BD, $conexion) or die(mysql_error($conexion));
 $email = $_POST['email'];
	$pass = $_POST['pwd'];


 $result = mysql_query("SELECT * from usuarios where email='" . $email . "'");
 

	if($row = mysql_fetch_array($result)){
	if($row['pwd'] == $pass){
		
	session_start();
	$_SESSION['name'] = $row['name'];
	$_SESSION['email'] = $email;
	$_SESSION['pass']    = $pass;
	$_SESSION["aut"]  = 1;

	header("Location: Admin/starter.php");
	}else{
	header("Location: index.html");
	exit();
	}
	}else{
	header("Location: index.html");
	exit();
}
?>
 