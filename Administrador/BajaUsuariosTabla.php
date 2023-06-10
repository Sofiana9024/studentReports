<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    
    <script type="text/javascript">
        var vsid = "si21315";
        (function() { 
        var vsjs = document.createElement('script'); vsjs.type = 'text/javascript'; vsjs.async = true; vsjs.setAttribute('defer', 'defer');
        vsjs.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.virtualspirits.com/vsa/chat.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vsjs, s);
        })();
    </script>
   
    <title>Manejo de Usuarios</title>
</head>
<body>
    <header class="navbar">
        <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <img src="../img/logoNoF.png" alt="Logotipo UPSLP" class="logo1">
        <nav>
            <ul>
                <li><a href="index.html">Usuarios</a></li> 
                <li><a href="#">Kardex</a></li>
                <li><a href="#">Plan de Estudios</a></li>
                <li><a href="#">Ayuda</a></li>
            </ul>
        </nav>
        <img src="img/logo_personal.png" alt="" class="logo2">
    </header>

    <h1>Baja de Usuario</h1>
    
    <div class="contenido">                         
        <div class="bloque">
            <table>
                <?php
                //include 'conn.php'; CON ESTA LINEA SUSTITUIMOS LAS SIGUIENTES 4
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "myDB1";
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
                } 
                $sql = "SELECT id, firstname, lastname, email FROM MyGuests";
                $result = $conn->query($sql); //ejecutamos el query y el resultado se guerda en un arreglo bidi, en este caso es $result
                if ($result->num_rows > 0) {  //num_rows le pregunta cuantas filas se trajo y si el reultado es mayor que 0 imprime los registros
                 // output data of each row
                 echo "<tr>";
                 echo "<td>ID</td>";
                 echo "<td>NOMBRE</td>";
                 echo "<td>APELLIDO</td>";
                 echo "<td>EMAIL</td>";
                 echo "</tr>";
                 while($row = $result->fetch_assoc()) {   //fetch va obteniendo una linea y se lo asigna a la variable row, se termina cuando fetch ya no encuentra que mas leer,,,,,, fetch asocc coloca la variable result en un arreglo nombrado
                    echo "<tr>";
                    echo "<td>". $row["id"]."</td>";
                    echo "<td>". $row["firstname"]."</td>";
                    echo "<td>". $row["lastname"]."</td>";
                    echo "<td>". $row["email"]."</td>";
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
        <button class="boton_regresar"><a href="index.html">Regresar</a></button>
    </div>
    
    </div>

    <footer>
        <p>Sitio creado por Raul Reyes Urbina & Ana Sofía Rodríguez</p>
    </footer>
</body>
</html>