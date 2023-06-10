<?php
//Carga la imagen del plan de estudio y se la muestra al usuario en un pdf
require('../../misc/librerias/fpdf/fpdf.php');
$pdf = new FPDF('L', 'mm', array(926, 1322));
$pdf->AddPage();
$pdf->Image("../../img/Plan de estudio ITI.png", 0, 0);
$pdf->Output();
