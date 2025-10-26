<?php
require('fpdf184/fpdf.php');
require_once'../Class/User.php';
$u=new User();
$data=$u->displayuser();


$pdf = new FPDF('L');
$pdf->setMargins(20,20,20);
$pdf->AddPage();
$pdf->Image('../Res/Images/LOGO.png',110,18,10);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 5, 'WATER LEVEL MONITOR', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 5, 'User List', 0, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(10, 5,'#', 1, 0, 'C');
$pdf->Cell(35, 5,'Last Name', 1, 0, 'L');
$pdf->Cell(55, 5,'First Name', 1, 0, 'L');
$pdf->Cell(35, 5,'Middle Name', 1, 0, 'L');
$pdf->Cell(35, 5,'Contact', 1, 0, 'L');
$pdf->Cell(0, 5,'Address', 1, 1, 'L');

$c=1;
$pdf->SetFont('Arial', '', 10);
while($row=$data->fetch_assoc()){
    $pdf->Cell(10, 5,$c, 1, 0, 'C');
    $pdf->Cell(35, 5, $row['LastName'], 1, 0, 'L');
    $pdf->Cell(55, 5, $row['FirstName'], 1, 0, 'L');
    $pdf->Cell(35, 5, $row['MiddleName'], 1, 0, 'L');
    $pdf->Cell(35, 5, $row['ContactNo'], 1, 0, 'L');
    $pdf->Cell(0, 5, $row['Address'], 1, 1, 'L');
    $c++;
}

$pdf->Output();
?>