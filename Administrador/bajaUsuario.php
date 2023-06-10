<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <script type="text/javascript">
        var vsid = "si21315";
        (function() { 
        var vsjs = document.createElement('script'); vsjs.type = 'text/javascript'; vsjs.async = true; vsjs.setAttribute('defer', 'defer');
        vsjs.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.virtualspirits.com/vsa/chat.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vsjs, s);
        })();
    </script>

    <title>Alta Usuario</title>
</head>
<body>
    <?php
    /* Aqui pones los datos de tu base de datos pero se deben remplazar por los que crees en tu servidor web*/
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "proyecto01";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
/*Recibimos los valores de los formularios en variables */
        $d_usuario = $_POST['bu_usuario'];            /*ponemos dentro del post lo que tiene name en el formulario */
        $d_password = $_POST['bu_password'];

        $sql = "DELETE FROM usuarios WHERE usuario ='$d_usuario'";/*Pones los datos en el orden de los campos  */

        if ($conn->query($sql) === TRUE) {
/*Aqui es donde se muestra el mensaje de que se dio de baja*/
        ?>
             <div class="contenido">                         
                <div class="bloque">
                    <h3>Baja realizada con exito</h3>
                </div>
            </div>

            <div class="contenido">
                <button class="boton_regresar"><a href="BajaUsuarios.html">Regresar</a></button>
            </div>
        <?php
        } else {
        ?>
            <div class="contenido">                         
               <div class="bloque">
                   <h3>Ha habido un error!!!</h3>
                   <p>Revise que el usuario y password sean correctos</p>
               </div>
           </div>

           <div class="contenido">
               <button class="boton_regresar"><a href="BajaUsuarios.html">Regresar</a></button>
           </div>
       <?php
//Si quisieras mostrar especificamente el error tendrias que dejar la siguiente linea
  //          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    ?>
</body>
</html>