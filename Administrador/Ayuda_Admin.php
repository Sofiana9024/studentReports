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
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   
    <title>Manejo de Usuarios</title>
</head>
<body>
    <header class="navbar">
        <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
        <img src="../img/logoNoF.png" alt="Logotipo UPSLP" class="logo1">
        <nav>
            <ul>
                <li><a href="Usuarios/index_Usuarios.php">Usuarios</a></li> 
                <li><a href="Kardex/index_Kardex.php">Kardex</a></li>
                <li><a href="Plan de Estudios/index_Plan.php">Plan de Estudios</a></li>
                <li><a href="Ayuda_Admin.php">Ayuda</a></li>
				<li><a href="../../index.php" style="color:red">Cerrar Sesion</a></li>
            </ul>
        </nav>
        <img src="img/logo_personal.png" alt="" class="logo2">
    </header>
    <h1>Ayuda</h1>

        <div class="bloque">
            <h2>FAQ:</h2>
            <div class="objetivos">
                <div class="obj">
                    <p>¿Qué puede hacer el administrador?</p><br>
                    El administrador puede manejar a los usuarios, esto incluye alta de usuarios, baja de usuarios
                    modificación de usuarios, consulta de usuarios, además de importar un kardex, consultar el
                    plan de estudios, importar un plan de estudios, consultar el plan de estudios y consultar
                    los usuarios
                </div>
                <div class="obj">
                    <p>¿Dónde importar el Plan de Estudios?</p> <br>
                    En la pestaña Plan de Estudios encontrará lo que busca
                </div>
                <div class="obj">
                    <p>¿Cómo modificar un usuario?</p> <br>
                    Para esto deberá ingresar a la sección Manejo de usuarios, acto seguido debe seleccionar modificación
                    de usuarios
                </div>
                <div class="obj">
                    <p>¿Cómo consultar el plan de estudios?</p> <br>
                    En la pestaña plan de estudios podrá encontrar la sección consultar plan de estudios
                </div>
            </div>
        </div>
    </div>
<?php require_once "footer.php"; ?>