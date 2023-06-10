<?php require_once "../navbar.php";?>

     <h1>Modificación de Usuario</h1>
    
    <div class="contenido">                         
        <div class="bloque">
            <form action="usuarioEspecifico.php" class="alta_usuarios" method="post">
                <label for="modifica_usuario">Usuario a modificar</label>       <!--bu = baja usuario -->
                <input type="text" id="modifica_usuario" name="modifica_usuario" class="input" required>

                <input class="boton_guardar" type="submit" value="Buscar">

            </form>
        </div>
    </div>

    <div class="contenido">
        <button class="boton_regresar"><a href="index_Admin.html">Regresar</a></button>
    </div>
    
    </div>
<?php require_once "../footer.php"; ?>