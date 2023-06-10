<?php require_once "../navbar.php";?>

    <h1>Baja de Usuario</h1>

    <div class="contenido_tabla">
        <div class="bloque_tabla">
             <table class="consultas">
             <?php
                 require("../../misc/conn.php");
                 // Create connection
                 $conn = new mysqli($servername, $username, $password, $dbname);
                 // Check connection
                 if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                 } 
 
                 $sql = "SELECT id, usuario, password, tipo FROM usuarios";
                 $result = $conn->query($sql); //ejecutamos el query y el resultado se guerda en un arreglo bidi, en este caso es $result
                 if ($result->num_rows > 0) {  //num_rows le pregunta cuantas filas se trajo y si el reultado es mayor que 0 imprime los registros
                 // output data of each row
                 echo "<tr style = 'color: #001E6C;' >";
                 echo "<td class='thead'> ID </td>";
                 echo "<td class='thead'> USUARIO </td>";
                 echo "<td class='thead'> PASSWORD </td>";
                 echo "<td class='thead'> TIPO </td>";
                 echo "</tr>";
                 while($row = $result->fetch_assoc()) {   //fetch va obteniendo una linea y se lo asigna a la variable row, se termina cuando fetch ya no encuentra que mas leer,,,,,, fetch asocc coloca la variable result en un arreglo nombrado
                     echo "<tr class='trow'>";
                     echo "<td class='trow' >". $row["id"]."</td>";
                     echo "<td class='trow'>". $row["usuario"]."</td>";
                     echo "<td class'trow'>". $row["password"]."</td>";
                     echo "<td class='trow'>". $row["tipo"]."</td>";
					 echo "<td class='trow'><a href = 'borrar_usuario.php?id=".$row["id"]."'>Borrar</a></td>";
					 echo "<td class='trow'><a href = 'usuarioEspecifico.php?id=".$row["id"]."'>Modificar</a></td>";
                     echo "</tr>";
                 }
                 } else {
                 echo "0 results";
                 }
                 $conn->close();
             ?>
             </table>
         </div>
     </div>

    <div class="contenido">
        <button class="boton_regresar"><a href="index_Usuarios.php">Regresar</a></button>
    </div>
    
    </div>

<?php require_once "../footer.php"; ?>