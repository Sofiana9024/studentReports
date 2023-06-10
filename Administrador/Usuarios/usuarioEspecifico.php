
<!--SEGUNDA PAGINA-->
<?php require_once "../navbar.php";
$usuarioModificar = $_GET["id"];?>
    <h1>Modificación de Usuario</h1>
    
    
    <div class="contenido">                         
        <div class="bloque">
            <form action="actualizaUsuario.php?id=<?php echo $usuarioModificar;?>" class="alta_usuarios" method="post">

            <?php
				
                require("../../misc/conn.php");
				
                $sql = "SELECT * FROM usuarios WHERE id = '".$usuarioModificar."' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                while($row = $result->fetch_assoc()) {   //fetch va obteniendo una linea y se lo asigna a la variable row, se termina cuando fetch ya no encuentra que mas leer,,,,,, fetch asocc coloca la variable result en un arreglo nombrado
                    $usuario = $row["usuario"];
                    $contra = $row["password"];
                    $tipo = $row["tipo"];
                }

                echo "<label for='mo_usuario'>Usuario</label>";
                echo "<input type='text' id='mo_usuario' value='$usuario' name='mo_usuario' class='input' required>";

                echo "<label for='nu_password'>Password</label>";
                echo "<input type='text' id='nu_password' name='nu_password' value='$contra' class='input' required>";

                echo "<fieldset class='caja_radio_usuarios'>";
                    
                    echo "<legend>Tipo de Usuario</legend>";
                    
                    switch ($tipo) {
                        case "Administrador":
                            echo "<label for='radio-admin'><input type='radio' selected name='tipoUsuario' checked='checked' value='Administrador' id='radio-admin'>Administrador</label>";
                            echo "<label for='radio-profesor'><input type='radio'  name='tipoUsuario' value='Profesor' id='radio-profesor'>Profesor</label>";
                            echo "<label for='radio-coordinador'><input type='radio'  name='tipoUsuario' value='Coordinador' id='radio-coordinador'>Coordinador</label>";
                            echo "<label for='radio-tutor'><input type='radio'  name='tipoUsuario' value='Tutor' id='radio-tutor'>Tutor</label>";
                            echo "<label for='radio-alumno'><input type='radio'  name='tipoUsuario' value='Alumno' id='radio-alumno'>Alumno</label>";
                            break;
                        case "Profesor":
                            echo "<label for='radio-admin'><input type='radio' selected name='tipoUsuario'  value='Administrador' id='radio-admin'>Administrador</label>";
                            echo "<label for='radio-profesor'><input type='radio'  name='tipoUsuario' checked='checked' value='Profesor' id='radio-profesor'>Profesor</label>";
                            echo "<label for='radio-coordinador'><input type='radio'  name='tipoUsuario' value='Coordinador' id='radio-coordinador'>Coordinador</label>";
                            echo "<label for='radio-tutor'><input type='radio'  name='tipoUsuario' value='Tutor' id='radio-tutor'>Tutor</label>";
                            echo "<label for='radio-alumno'><input type='radio'  name='tipoUsuario' value='Alumno' id='radio-alumno'>Alumno</label>";
                            break;
                        case "Coordinador":
                            echo "<label for='radio-admin'><input type='radio' selected name='tipoUsuario'  value='Administrador' id='radio-admin'>Administrador</label>";
                            echo "<label for='radio-profesor'><input type='radio'  name='tipoUsuario' value='Profesor' id='radio-profesor'>Profesor</label>";
                            echo "<label for='radio-coordinador'><input type='radio'  name='tipoUsuario' checked='checked' value='Coordinador' id='radio-coordinador'>Coordinador</label>";
                            echo "<label for='radio-tutor'><input type='radio'  name='tipoUsuario' value='Tutor' id='radio-tutor'>Tutor</label>";
                            echo "<label for='radio-alumno'><input type='radio'  name='tipoUsuario' value='Alumno' id='radio-alumno'>Alumno</label>";
                            break;
                        case "Tutor":
                            echo "<label for='radio-admin'><input type='radio' selected name='tipoUsuario'  value='Administrador' id='radio-admin'>Administrador</label>";
                            echo "<label for='radio-profesor'><input type='radio'  name='tipoUsuario'  value='Profesor' id='radio-profesor'>Profesor</label>";
                            echo "<label for='radio-coordinador'><input type='radio'  name='tipoUsuario' value='Coordinador' id='radio-coordinador'>Coordinador</label>";
                            echo "<label for='radio-tutor'><input type='radio'  name='tipoUsuario' checked='checked' value='Tutor' id='radio-tutor'>Tutor</label>";
                            echo "<label for='radio-alumno'><input type='radio'  name='tipoUsuario' value='Alumno' id='radio-alumno'>Alumno</label>";
                            break;
                        case "Estudiante":
                            echo "<label for='radio-admin'><input type='radio' selected name='tipoUsuario'  value='Administrador' id='radio-admin'>Administrador</label>";
                            echo "<label for='radio-profesor'><input type='radio'  name='tipoUsuario'  value='Profesor' id='radio-profesor'>Profesor</label>";
                            echo "<label for='radio-coordinador'><input type='radio'  name='tipoUsuario' value='Coordinador' id='radio-coordinador'>Coordinador</label>";
                            echo "<label for='radio-tutor'><input type='radio'  name='tipoUsuario'  value='Tutor' id='radio-tutor'>Tutor</label>";
                            echo "<label for='radio-alumno'><input type='radio'  name='tipoUsuario' checked='checked' value='Alumno' id='radio-alumno'>Alumno</label>";
                            break;
                    }
                
                echo "</fieldset>";

                echo "<input class='boton_guardar' type='submit' value='Guardar'>";

                echo"</form>";
             echo"</div>";
        echo"</div>";

                echo "<div class='contenido'>";
                    echo "<button class='boton_regresar'><a href='index_Admin.html'>Regresar</a></button>";
                echo "</div>";
                }
                else{
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
                    //header("Location: http://localhost/PROYECTO_FINAL/signin.php?credentials=no_user");
                }
                $conn->close();
                ?>

<?php require_once "../footer.php"; ?>