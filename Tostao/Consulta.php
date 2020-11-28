<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "proyecto";

//Crear conexion
$conn = new mysqli ($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
//validar conexion
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}
mysqli_set_charset($conn,"utf8");
$cuerpo = file_get_contents('php://input');
$usuario = json_decode($cuerpo);

$sql = "SELECT Email, Contrasena FROM Usuario WHERE Email = "."'". $usuario->Email ."'".""AND"";
try{
	//ejecutar consulta
	$result = $conn->query($sql);
	$entret = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$json_string = json_encode($entret, JSON_UNESCAPED_UNICODE);
	echo $json_string;
}
catch (mysqli_sql_exception $e) {
	echo "MySQLi Error Code: " . $e->getCode() . "</br />";
	echo "Exception Msg: " . $e->getMessage();
	exit();
}
$conn->close();
?>