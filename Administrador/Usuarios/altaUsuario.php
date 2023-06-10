<?php require_once "../navbar.php";?>

    <title>Alta Usuario</title>
</head>
<body>
    <?php
    /* Aqui pones los datos de tu base de datos pero se deben remplazar por los que crees en tu servidor web*/
       require("../../misc/conn.php");
/*Recibimos los valores de los formularios en variables */
        $new_usuario = $_POST['nu_usuario'];            /*ponemos dentro del post lo que tiene name en el formulario */
        $new_password = $_POST['nu_password'];
        $new_tipo = $_POST['tipoUsuario'];

        $sql = "INSERT INTO usuarios (usuario, password, tipo)  
        VALUES ('$new_usuario', '$new_password', '$new_tipo')"; /*Pones los datos en el orden de los campos  */

        if ($conn->query($sql) === TRUE) {
/*Aqui es donde se muestra el mensaje de que se guarda el registro */
        ?>
             <div class="contenido">                         
                <div class="bloque">
					aa
						
                    <h3>Alta realizada con exito</h3>
					<div class="manejo_usuarios"
						</div>
                </div>
            </div>

            <div class="contenido">
                <button class="boton_regresar"><a href="index_Usuarios.php">Regresar</a></button>
            </div>
        <?php
        } else {
        ?>
            <div class="contenido">                         
               <div class="bloque">
                   <h3>Ha habido un error!!!</h3>
               </div>
           </div>

           <div class="contenido">
               <button class="boton_regresar"><a href="index_Usuarios.php">Regresar</a></button>
           </div>
       <?php
//Si quisieras mostrar especificamente el error tendrias que dejar la siguiente linea
  //          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    ?>
</body>
</html>