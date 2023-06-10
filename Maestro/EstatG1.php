<?php
require_once("../misc/librerias/phpchart/conf.php");
session_start();
if($_SESSION["usertype"] != "academico")
	header("Location: http://localhost/PROYECTO_FINAL/index.php?credentials=no_auth");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    
    <script type="text/javascript">
        var vsid = "si21315";
        (function() { 
        var vsjs = document.createElement('script'); vsjs.type = 'text/javascript'; vsjs.async = true; vsjs.setAttribute('defer', 'defer');
        vsjs.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'www.virtualspirits.com/vsa/chat.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(vsjs, s);
        })();
    </script>
   
    <title>Estadísticas</title>
    <h1>Consultas</h1>

            <?php
            require("../misc/conn.php");

            $matricula = $_POST["periodo"];
          	$periodo = 2022;
          if($periodo == 2021){
                $sql = "SELECT matricula, semestre, materia, seccion, periodo, cfo, ext, reg, cf, creditos FROM kardex WHERE matricula = ".$matricula." AND seccion != 'REV' AND  (periodo = '20213S'  OR periodo = '20212S' OR periodo = '20211S')";
            }
            else if($periodo == 2022){
                $sql = "SELECT matricula, semestre, materia, seccion, periodo, cfo, ext, reg, cf, creditos FROM kardex WHERE matricula = ".$matricula." AND seccion != 'REV' AND (periodo = '20222S' OR periodo = '20221S')";
            }
            else if($periodo == 2023){
                $sql = "SELECT matricula, semestre, materia, seccion, periodo, cfo, ext, reg, cf, creditos FROM kardex WHERE matricula = ".$matricula." AND seccion != 'REV' AND periodo = '20233S'  OR periodo = '20232S' OR periodo = '20231S'";
            }
            
            $result = $conn->query($sql);
        
            $s1= array(0,0,0,0,0,0,0);
            $s2= array();
            $i=0;
        
            while($row = $result->fetch_assoc()){
                
                    $s1[$i]=$row["cf"];
                    
                      $s2[$i]=$row["creditos"];
                  $i++;
            }

            $pc = new C_PhpChartX(array($s1),'basic_chart');
            $pc->set_title(array('text'=>'Calificaciones del periodo '.$periodo.''));
           $pc->draw();
            
            $conn->close();
            ?>
    <footer>
        <p>Sitio creado por Raul Reyes Urbina & Ana Sofía Rodríguez</p>
    </footer>
</body>
</html>