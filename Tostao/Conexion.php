<<?php 
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "proyecto";
//Crear conexion
$conn = new mysqli ($servername, $username, $password, $dbname);
//Validar conexion
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn,"utf8");
$cuerpo = file_get_contents('php://input');
$usuario = json_decode($cuerpo);


$sql = "INSERT INTO usuario (Nombre, Apellido, Direccion, Celular, Edad, Email, Usuario, Contrasena) VALUES(" . "'" . $usuario->Nombre . "'" . ",'" .$usuario->Apellido. "'". ",'".$usuario->Direccion. "'".",'" .$usuario->phone . "'". ",'" .$usuario->Edad. "'". ",'" .$usuario->Email . "'". ",'" .$usuario->Usuario . "'". ",'" .$usuario->Contrasena . "'". ")";
//Ejecutar consulta
$result = $conn->query($sql);
if($result){
	//echo "New record created successfully";
	echo  "OK";
	//file_put_contents('php://stderr', print_r("New record created successfully", TRUE));
}else {
	//$foo = "Error";
	error_log(print_r(mysqli_error($conn), TRUE), 0);
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$conn->close();
 ?>