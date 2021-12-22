<?php

require('fpdf.php');

$pdf_file = $name . '.pdf';

$pdf -> new FPDF();
$pdf -> AddPage();
$pdf -> SetFont('Arial', 'B', 16);


$pdf -> Cell(100, 20, 'Rechnung', 1 , 0 , 'C');


$pdf -> Output();



?>