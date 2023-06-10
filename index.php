<?php
session_start();
$_SESSION["usertype"] = "";
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio de Sesion</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="Page description">    
    <!--Open Graph data-->    
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
    <link rel="manifest" href="img/site.webmanifest">
    <link rel="mask-icon" href="img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" media="all" href="css/app.css">
  </head>
  <body>
    <div class="page page_login">
      <form class="form" action="login.php" method="post">
        <div class="form__container">	
          <div class="logo"><img class="logo__pic" src="img/logo.png" width="250"></div>
          <div class="fieldset">
            <div class="field"><input class="input" type="text" name="usuario" placeholder="Usuario" required></div>
            <div class="field"><input class="input" type="password" name="password" placeholder="Contraseña" required></div>
			   <!-- MOSTRAR ESTE TEXTO CUANDO EL USUARIO NO SE ENCUENTRE
			<p id="warning">Usuario y/o contraseña incorrectos</p> -->
			  <?php
			   //print_r($_GET["credentials"]);
  				if( isset($_GET["credentials"]) ) {
					$cred = $_GET["credentials"];
					if($cred == "no_user")
						echo "<p id='warning'>Usuario y/o contraseña incorrectos</p>";
					else if($cred == "pass_incorrecto")
						echo "<p id='warning'>Contraseña incorrecta</p>";
					else if($cred == "no_auth")
						echo "<p id='warning'>No se tienen las credenciales adecuadas para accesar a este sitio</p>";
				}
			  	?>
          </div><button class="btn">Iniciar Sesion</button>
          
        </div>
        
      </form>
      <div class="about">174104</div>
    </div>
  </body>
</html>
