<?php require_once "../navbar.php";?>
    <h1>Alta de Usuarios</h1>
    
    <div class="contenido">                         
        <div class="bloque">
            <form action="altaUsuario.php" class="alta_usuarios" method="post">
                <label for="nu_usuario">Nuevo Usuario</label>       <!--nu = nuevo usuario -->
                <input type="text" id="nu_usuario" name="nu_usuario" class="input" required>

                <label for="nu_password">Password</label>
                <input type="text" id="nu_password" name="nu_password" class="input" required>

                <fieldset class="caja_radio_usuarios">
                    <legend>Tipo de Usuario</legend>
                    <label for="radio-admin"><input type="radio"  name="tipoUsuario" value="Administrador" id="radio-admin">Administrador</label>
                    <label for="radio-profesor"><input type="radio"  name="tipoUsuario" value="Profesor" id="radio-profesor">Profesor</label>
                    <label for="radio-coordinador"><input type="radio"  name="tipoUsuario" value="Coordinador" id="radio-coordinador">Coordinador</label>
                    <label for="radio-tutor"><input type="radio"  name="tipoUsuario" value="Tutor" id="radio-tutor">Tutor</label>
                    <label for="radio-alumno"><input type="radio"  name="tipoUsuario" value="Alumno" id="radio-alumno">Alumno</label>
                </fieldset>
                
                <input class="boton_guardar" type="submit" value="Guardar">

            </form>
        </div>
    </div>

    <div class="contenido">
        <button class="boton_regresar"><a href="index_Usuarios.php">Regresar</a></button>
    </div>
    
    </div>

    <footer>
        <p>Sitio creado por Raul Reyes Urbina & Ana Sofía Rodríguez</p>
    </footer>
</body>
</html>