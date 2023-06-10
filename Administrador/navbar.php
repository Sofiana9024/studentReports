<?php
session_start();
if($_SESSION["usertype"] != "admin")
	header("Location: http://localhost/PROYECTO_FINAL/index.php?credentials=no_auth");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styleAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="apple-touch-icon" sizes="180x180" href="../../img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../img/favicon-16x16.png">
    <title>Manejo de Usuarios</title>
</head>
<body>
    <header class="navbar">
        <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
        <img src="../../img/logoNoF.png" alt="Logotipo UPSLP" class="logo1">
        <nav>
            <ul>
                <li><a href="../Usuarios/index_Usuarios.php">Usuarios</a></li> 
                <li><a href="../Kardex/index_Kardex.php">Kardex</a></li>
                <li><a href="../Plan de Estudios/index_Plan.php">Plan de Estudios</a></li>
                <li><a href="../Ayuda_Admin.php">Ayuda</a></li>
				<li><a href="../../index.php" style="color:red">Cerrar Sesion</a></li>
            </ul>
        </nav>
        <img src="img/logo_personal.png" alt="" class="logo2">
    </header>