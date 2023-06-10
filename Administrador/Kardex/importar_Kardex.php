<?php require_once "../navbar.php";?>
    <h1>Importar Kardex</h1>
    
    <div class="contenido">                         
        <div class="bloque">
			<form action="cargar.php"  class="alta_usuarios" method="post" enctype="multipart/form-data">
			  <input type="file" name="upcsv" accept=".csv" required>
				
			  <input type="submit" value="Upload" class="boton_guardar">
			</form>
        </div>
    </div>

    <div class="contenido">
        <button class="boton_regresar"><a href="index_Kardex.php">Regresar</a></button>
    </div>
    
    </div>

    <footer>
        <p>Sitio creado por Raul Reyes Urbina & Ana Sofía Rodríguez</p>
    </footer>
</body>
</html>