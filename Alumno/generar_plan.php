
<?php
session_start();
//$username = $_SESSION["username"];
//Solicita el archivo que conecta con la base de datos
require("../misc/conn.php");

//Solicita las librerias para generar PDFs
require("../misc/librerias/fpdf/fpdf.php");
/*
if(!isset($_SESSION["username"])){
	$username = $_GET["username"];
}*/

//Crea un array bidimensional donde cada "casilla" sera una materia del plan de estudios,inicialmente se declaran todas como no aprobadas.
$aprobadas = array(array());

for($i = 0; $i<6; $i++){
	for($j=0;$j<9;$j++){
		$aprobadas[$j][$i] = "No Aprobada";
	}
}
if(!isset($_SESSION["username"]))
	$username = $_GET["username"];
else{
	$username = $_SESSION["username"];
}
//Busca el Kardex del usuario en la BD
$sql = "SELECT * FROM kardex WHERE matricula = '".$_SESSION["username"]."'";
//echo $sql;
$result = $conn->query($sql);

$num_reprobadas = 0;

while($row = $result->fetch_assoc()) {
	//Busca la materia en una tabla donde se encuentra cada materia con su correspondiente posicion x y
	$sql2 = "SELECT * FROM materias WHERE Nombre = '".$row["materia"]."'";
	$result2 = $conn->query($sql2);
	while($row2 = $result2->fetch_assoc()){
		//Si el periodo es 20223S significa que es el periodo actual, por lo cual la esta cursando y se le asigna dicho valor
		if($row["periodo"] == "20223S")
			//Se asigna en el array bidi previamente inicializado, usando como coordenadas las obtenidas previamente
			$aprobadas[$row2["x"]][$row2["y"]] = "Cursando";
		if($row["status"] == "Aprobado")
			$aprobadas[$row2["x"]][$row2["y"]] = "Aprobada";
		//Esta sentencia verifica si el usuario curso la materia, pero no la aprobo, por ende significa que esta reprobada
		if($row["cf"] > 0 and $row["cf"] < 7 and $row["status"] != "Aprobado"){
			if($row["periodo"] == "20223S"){
				$aprobadas[$row2["x"]][$row2["y"]] = "Advertencia";
			}
			else{
				$aprobadas[$row2["x"]][$row2["y"]] = "Reprobo";
			}
			$num_reprobadas++;
		}
		
			
	}
  }

//Esta seccion del codigo es la que determina cuales materias serian recomendables de cursar el siguiente semestre para el usuario, esto se hace agarrando las primeras 5 materias que siguen en el plan de estudio, si el usuario ha reprobado materias se le sugerira una carga academica menor
$max = 6;
if($num_reprobadas > 2){
	$max = 5;
}
elseif($num_reprobadas == 0){
	$max = 7;
}

$n = 0;
$siguiente = true;

$sql = "SELECT * FROM kardex WHERE matricula = '".$username."' and status = '-' and seccion = ''";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()) {
	$siguiente = false;
	$sql1 = "SELECT * FROM seriacion WHERE materia = '".$row["materia"]."'";
	$result1 = $conn->query($sql1);
	while($row1 = $result1->fetch_assoc()){
		if($row1["prerequisito"] == "-"){
			$sql2 = "SELECT * FROM materias WHERE Nombre = '".$row["materia"]."'";
				$result2 = $conn->query($sql2);
	
				while($row2 = $result2->fetch_assoc() and $n<$max){
				//print_r($row2);
				$aprobadas[$row2["x"]][$row2["y"]] = "Siguiente";
				$n++;
			}
		}
		$sql3 = "SELECT * FROM kardex WHERE matricula = '".$username."' and materia = '".$row1["prerequisito"]."'";
		$result3 = $conn->query($sql3);
		while($row3 = $result3->fetch_assoc()){
			 if($row3["status"] == "Aprobado" or $row3["periodo"] == "20223S"){
				$sql2 = "SELECT * FROM materias WHERE Nombre = '".$row["materia"]."'";
				$result2 = $conn->query($sql2);
	
				while($row2 = $result2->fetch_assoc() and $n<$max){
				$aprobadas[$row2["x"]][$row2["y"]] = "Siguiente";
				$n++;
			}
			 }
		 }
	}
	
	
  }

for ($i = 0; $i<6; $i++){
	for ($j = 0; $j<9; $j++){

	}
}

//En esta seccion se declaran los colores a usar para cada tipo de status
$im = imagecreatetruecolor(5000, 3500);
$white = imagecolorallocate($im, 255, 255, 255);
$green = imagecolorallocate($im, 9, 121, 105);
$red = imagecolorallocate($im, 191, 10, 48);
$blue = imagecolorallocate($im, 0, 79, 152);
$grey = imagecolorallocate($im, 65, 65, 65);
$yellow = imagecolorallocate($im, 155, 135, 12);
$orange = imagecolorallocate($im, 255, 103, 0);

imagealphablending($im, false);
$transparency = imagecolorallocatealpha($im, 0, 0, 0, 127);
imagefill($im, 0, 0, $transparency);
imagesavealpha($im, true);

$x = 300;
$y = 480;
$color;

//Con ayuda de un ciclo recorrera todo el arreglo de materias y verificando su status, en base a este se le dictaminara un color u otro al cuadro que se generara posteriormente 
for ($i = 0; $i<6; $i++){
	for ($j = 0; $j<9; $j++){
		if($aprobadas[$j][$i] == "Aprobada")
			$color = $green;
		elseif($aprobadas[$j][$i] == "No Aprobada")
			$color = $grey;
		elseif($aprobadas[$j][$i] == "Advertencia")
			$color = $orange;
		elseif($aprobadas[$j][$i] == "Cursando")
			$color = $blue;
		elseif($aprobadas[$j][$i] == "Reprobo")
			$color = $red;
		elseif($aprobadas[$j][$i] == "Siguiente")
			$color = $yellow;
		
		imagefilledrectangle($im, $x, $y, $x+330, $y+330, $color);
		$x+=508;
	}
	$y+= 440;
	$x = 300;
}

//Una vez generados los recangulos de colores esto se guardara como una imagen png
imagepng($im, 'img/mapadecolor.png');
imagedestroy($im);

//Ahora ya que se tiene el mapa de colores para cada materia lo que se hara sera superponer una imagen previamente hecha con la estructura de mapa y nombres por encima del mapa de colores
$image_1 = imagecreatefrompng('img/mapadecolor.png');
$image_2 = imagecreatefrompng('img/estructura.png');
imagealphablending($image_1, true);
imagesavealpha($image_1, true);
imagecopy($image_1, $image_2, 0, 0, 0, 0, 5000, 3500);
imagepng($image_1, 'img/mapasinfondo.png');


//Se hara un procesamiento de imagen una ultima vez para agregar un color de fondo al plan de estudio
$image_1 = imagecreatefrompng('img/fondo.png');
$image_2 = imagecreatefrompng('img/mapasinfondo.png');
imagealphablending($image_1, true);
imagesavealpha($image_1, true);
imagecopy($image_1, $image_2, 0, 0, 0, 0, 5000, 3500);
imagepng($image_1, 'img/mapacurricular.png');

//Ya que se tiene la imagen final se crea un objeto PDF para mostrar la imagen en un archivo de dicho formato
$pdf = new FPDF('L', 'mm', array(926, 1322));
$pdf->AddPage();
$pdf->Image("img/mapacurricular.png", 0, 0);
$pdf->Output();
?>
