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
                <li><a href="#">Usuarios</a></li> 
                <li><a href="Kardex/index_Kardex.php"	>Kardex</a></li>
                <li><a href="Plan de Estudios/index_Plan.php">Plan de Estudios</a></li>
                <li><a href="#">Ayuda</a></li>
            </ul>
        </nav>
        <img src="img/logo_personal.png" alt="" class="logo2">
    </header>
	<h1>Manejo de Usuarios</h1>

    <div class="contenido">
        <div class="bloque">
            <div class="manejo_usuarios">
                <div class="boton_manejo_usuarios "><a href="Usuarios/AltaUsuarios.php">Alta de Usuarios</a></div> 
                <div class="boton_manejo_usuarios "><a  href="Usuarios/BajaUsuarios.php">Baja de Usuarios</a></div>
                <div class="boton_manejo_usuarios "><a  href="Usuarios/ModificacionUsuario.php">Modificación de Usuarios</a></div>
                <div class="boton_manejo_usuarios "><a  href="#">Consulta de Usuarios</a></div>
            </div>
        </div>
    </div>
	    <footer>
        <p>Sitio creado por Raul Reyes Urbina & Ana Sofía Rodríguez</p>
    </footer>
</body>
</html>