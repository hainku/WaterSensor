<?php
require('fpdf184/fpdf.php');
require_once'../Class/User.php';
$u=new User();
$data=$u->displayresident();


$pdf = new FPDF('L');
$pdf->setMargins(20,20,20);
$pdf->AddPage();
$pdf->Image('../Res/Images/LOGO.png',110,18,10);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 5, 'WATER LEVEL MONITOR', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 5, 'Residents List', 0, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Times', 'B', 10);
$pdf->Cell(10, 5,'#', 1, 0, 'C');
$pdf->Cell(70, 5,'Name', 1, 0, 'L');
$pdf->Cell(15, 5,'House #', 1, 0, 'L');
$pdf->Cell(70, 5,'Street', 1, 0, 'L');
$pdf->Cell(15, 5,'Purok', 1, 0, 'L');
$pdf->Cell(35, 5,'Contact', 1, 0, 'L');
$pdf->Cell(15, 5,'Head', 1, 1, 'L');

$c=1;
$pdf->SetFont('Arial', '', 10);
while($row=$data->fetch_assoc()){
    $hh=$row['HouseholdHead']==1 ? 'yes':'';
    $name=$row['LastName'].', '.$row['FirstName'].' - '.$row['MiddleName'];
    $pdf->Cell(10, 5,$c, 1, 0, 'C');
    $pdf->Cell(70, 5, $name, 1, 0, 'L');
    $pdf->Cell(15, 5, $row['HouseNumber'], 1, 0, 'L');
    $pdf->Cell(70, 5, $row['Street'], 1, 0, 'L');
    $pdf->Cell(15, 5,$row['Purok'], 1, 0, 'C');
    $pdf->Cell(35, 5,$row['ContactNo'], 1, 0, 'L');
    $pdf->Cell(15, 5,$hh, 1, 1, 'C');
    $c++;
}

$pdf->Output();
?>