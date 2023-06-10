<!--TERCERA PAGINA-->
<?php require_once "../navbar.php";
$usuarioAmodificar = $_GET["id"];?>
    <h1>Modificaión de Usuario</h1>
    <div class="contenido">                         
        <div class="bloque">
        
    <?php
		
    /* Aqui pones los datos de tu base de datos pero se deben remplazar por los que crees en tu servidor web*/
        require("../../misc/conn.php");
/*Recibimos los valores de los formularios en variables */
        $new_usuario = $_POST['mo_usuario'];            /*ponemos dentro del post lo que tiene name en el formulario */
        $new_password = $_POST['nu_password'];
        $new_tipo = $_POST['tipoUsuario'];
echo $new_usuario."....".$new_password.".....".$new_tipo."....".$usuarioAmodificar;
      //  $_SESSION['modificAusuario']= $_REQUEST['modifica_usuario'];
        //$usuarioAmodificar = $_SESSION['modificAusuario'];
        $sql = "UPDATE usuarios SET usuario='".$new_usuario."', password='".$new_password."', tipo='".$new_tipo."' WHERE id='".$usuarioAmodificar."'";//
        
        if ($conn->query($sql) === TRUE) {

/*Aqui es donde se muestra el mensaje de que se guarda el registro */
        ?>
             <div class="contenido">                         
                <div class="bloque">
                    <h3>Modificación realizada con exito</h3>
                </div>
            </div>

            <div class="contenido">
                <button class="boton_regresar"><a href="ModificacionUsuario.html">Regresar</a></button>
            </div>
        <?php
        } else {
            echo $usuarioAmodificar;
            
        ?>
            <div class="contenido">                         
               <div class="bloque">
                   <h3>Ha habido un error!!!</h3>
               </div>
           </div>

           <div class="contenido">
               <button class="boton_regresar"><a href="ModificacionUsuario.php ">Regresar</a></button>
           </div>
       <?php
        }
        $conn->close();
    ?>
        </div>
    </div>
</body>
</html>