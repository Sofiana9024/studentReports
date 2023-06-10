
<?php require_once "navbar.php";?>

<h1>Porcentaje de creditos obtenidos</h1>

    <div class="contenido">
        <div class="bloque">
            <div class="manejo_usuarios" style="text-align: left">
				<?php
				$matriculas = array();
				$i = 0;
				require("../misc/conn.php");
				$sql = "SELECT DISTINCT matricula FROM kardex";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					if($row["matricula"] != 0){
						$matriculas[$i] = $row["matricula"];
						$i++;
					}
            	}
				$creditos_necesarios = 408;
				$creditos = array();
				$porcentajes = array();
				for($j = 0; $j < $i; $j++){
					$creditos[$j] = 0.0;
					$sql = "SELECT * FROM kardex WHERE matricula = ".$matriculas[$j];
					$result = $conn->query($sql);
					echo $matriculas[$j].": ";
					while($row = $result->fetch_assoc()){
						$creditos[$j] += $row["creditos"];
            		}
					$porcentajes[$j] = ($creditos[$j]/$creditos_necesarios) * 100;
					$sqres = 0;
					for($x=0;$x<=$porcentajes[$j];$x++){
						if($x%5 == 0){
							echo "■";
							$sqres++;
						}
					}
					while($sqres<20){
						echo "□";
						$sqres++;
					}
					
					
					echo "&nbsp;&nbsp;&nbsp;".round($porcentajes[$j], 2)."%<br>";
					
				}
				
				
				?>
                
            </div>
        </div>
    </div>

<?php require_once "footer.php"; ?>