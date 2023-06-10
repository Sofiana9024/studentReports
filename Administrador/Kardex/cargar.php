<?php

//Este archivo se encarga de leer el archivo CSV subido e irlo leyendo linea por linea al mismo tiempo que se va agregando a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "plataforma_upslp";
$dbChar = "utf8";
//se crea el objeto PDO para manipular bases de datos
try {
  $pdo = new PDO(
    "mysql:host=".$servername.";dbname=".$dbname.";charset=".$dbChar,
    $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
  );
} catch (Exception $ex) { exit($ex->getMessage()); }
 //se abre el archivo csv en modo lectura
$fh = fopen($_FILES["upcsv"]["tmp_name"], "r");
if ($fh === false) { exit("El archivo CSV no es valido"); }
$idd = 136;
//mientras el archivo siga teniendo lineas se van insertando en la tabla de kardex
while (($row = fgetcsv($fh)) !== false) {
  try {
	  //estos signos de interrogacion son variables que en la linea de excecute seran llenadas
    $stmt = $pdo->prepare("INSERT INTO `kardex` (`id`, `matricula`, `semestre`, `materia`,
	`seccion`, `periodo`, `cfo`, `cf`, `creditos`, `status`) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->execute([$idd++, $row[0], $row[1], $row[2], $row[3],$row[4], $row[5], $row[6], $row[7], $row[8]]);
  } catch (Exception $ex) { echo $ex->getmessage(); }
}


fclose($fh);
echo "<script> location.href='cargado_correctamente.php'; </script>";