<?php
session_start();
?>
<?php
//REALIZA CONEXION CON LA BD
require "misc/conn.php";

//OTIENE LOS VALORES INGRESADOS EN EL FORM
$username = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE usuario = '".$username."'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
	//SI ENCUENTRA AL USUARIO EN LA BD MUESTRA ESTO
	$row = $result->fetch_assoc();
	if(!($row["password"] == $password)){
		header("Location: http://localhost/PROYECTO_FINAL/index.php?credentials=pass_incorrecto");
		return;
	}
		
	
	switch($row["tipo"]){
	case "Administrador":
		header("Location: /PROYECTO_FINAL/Administrador/Usuarios/index_Usuarios.php");
		$_SESSION["usertype"] = "admin";
		break;
		
	case "Alumno":
		header("Location: /PROYECTO_FINAL/Alumno/index_alumno.php?username=".$username);
		$_SESSION["usertype"] = "estudiante";
		break;
	default:
		header("Location: /PROYECTO_FINAL/Maestro/index_PAcademico.php");
		$_SESSION["usertype"] = "academico";
		break;
	}
	
	echo("<br>".$row["id"]."<br>");
	echo($row["usuario"]."<br>");
	echo($row["password"]."<br>");
	echo($row["tipo"]."<br>");
}
else{
	header("Location: http://localhost/PROYECTO_FINAL/index.php?credentials=no_user");
}
