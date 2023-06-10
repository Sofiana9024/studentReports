<?php require_once "../navbar.php";?>

    <h1>Consulta kardex</h1>
    
    <div class="contenido">                         
        <div class="bloque">
            <form action="../../Alumno/generar_plan.php" class="alta_usuarios" method="get">
                <label for="username">Matricula:</label>
                <input type="text" id="username" name="username" class="input" required>

                <input class="boton_guardar" type="submit" value="Consultar">
                
            </form>
        </div>
    </div>

    <div class="contenido">
        <button class="boton_regresar"><a href="index_Kardex.php">Regresar</a></button>
    </div>
    
    </div>

<?php require_once "../footer.php"; ?>