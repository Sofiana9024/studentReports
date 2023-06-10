
<?php require_once "../navbar.php";?>
	<h1>Consultas</h1>
    <div class="contenido">
        <div class="bloque">
            <table class="consultas">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "plataforma_upslp";
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
                echo "<tr>";
                echo "<td>ID</td>";
                echo "<td>USUARIO</td>";
                echo "<td>PASSWORD</td>";
                echo "<td>TIPO</td>";
                echo "</tr>";
                while($row = $result->fetch_assoc()) {   //fetch va obteniendo una linea y se lo asigna a la variable row, se termina cuando fetch ya no encuentra que mas leer,,,,,, fetch asocc coloca la variable result en un arreglo nombrado
                    echo "<tr>";
                    echo "<td>". $row["id"]."</td>";
                    echo "<td>". $row["usuario"]."</td>";
                    echo "<td>". $row["password"]."</td>";
                    echo "<td>". $row["tipo"]."</td>";
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

<?php require_once "../footer.php"; ?>