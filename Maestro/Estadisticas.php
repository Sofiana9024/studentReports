<?php
require_once("../misc/librerias/phpchart/conf.php");
require_once "navbar.php";
?>
<h1>Consultas</h1>

    <div class="contenido">
        <div class="bloque">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "plataforma_upslp";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT DISTINCT  periodo  FROM kardex";
            $result = $conn->query($sql);
//            echo '<form action="EstatG1.php" method="post"><br>';
//            echo "<label>Periodo: ";
//            echo "<select name='periodo'>";
//            while ($row = $result->fetch_assoc()){
 //              echo "<option value=".$row["periodo"].">".$row["periodo"]."</option>";
//            }
 //           echo "</select></label><br>";
 //           echo "<input type='submit' name='enviar'>";
 //           echo "</form>";
            $conn->close();
            //despues se muestran 2 opciones para elegir ver la posicion en la liga y los partidos ganados
            ?>

            <form action="EstatG1.php" method="post"><br>
            <label>Matricula: </label>
                <select name=periodo>
                    <option value=174104>174104</option>
                    <option value=178815>178815</option>
                </select><br>
                <input type=submit name=enviar>
            </form>

        </div>
    </div>   
<?php require_once "footer.php"; ?>