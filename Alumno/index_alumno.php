<?php 
$matriculas = $_GET["username"];
$_SESSION["username"] = $matriculas;
require_once("navbar.php");

?>

  <h1>Consulta kardex</h1>
    
    <div class="contenido">                         
        <div class="bloque">
            <form action="generar_plan.php" class="alta_usuarios" method="get">
                
                <?php
				
				$i = 0;
				require("../misc/conn.php");
				$creditos_necesarios = 408;
				$creditos = 0;
				$porcentajes = 0;
					$sql = "SELECT * FROM kardex WHERE matricula = ".$matriculas;
					$result = $conn->query($sql);
					echo $matriculas.": ";
					while($row = $result->fetch_assoc()){
						$creditos += $row["creditos"];
            		}
					$porcentajes = ($creditos/$creditos_necesarios) * 100;
					$sqres = 0;
					for($x=0;$x<=$porcentajes;$x++){
						if($x%5 == 0){
							echo "■";
							$sqres++;
						}
					}
					while($sqres<20){
						echo "□";
						$sqres++;
					}
					
					
					echo "&nbsp;&nbsp;&nbsp;".round($porcentajes, 2)."%<br>";
					
				
				
				?>
				<input class="boton_guardar"  type="submit">
            </form>
        </div>
    </div>

    <div class="contenido">
        <button class="boton_regresar"><a href="index_Kardex.php">Regresar</a></button>
    </div>
    
    </div>
