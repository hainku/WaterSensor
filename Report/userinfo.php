<?php
require('fpdf184/fpdf.php');
require_once'../Class/User.php';
$u=new User();
$userid=$_GET['userid'];
$data=$u->displayuserbyid($userid);
if($row=$data->fetch_assoc()){
    $name=$row['LastName'].', '.$row['FirstName'];
    $address=$row['Address'];
    $contact=$row['ContactNo'];
    $role=$row['Role'];
    $un=$row['Username'];
    $pw=$row['Password'];
}

$pdf = new FPDF();
$pdf->setMargins(20,20,20);
$pdf->AddPage();
$pdf->Image('../Res/Images/LOGO.png',65,18,10);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(0, 5, 'WATER LEVEL MONITOR', 0, 1, 'C');
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 5, 'User Data', 0, 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5,'Name', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(95, 5,$name, 'B', 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5,'Address', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 5,$address, 'B', 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5,'Contact No', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(70, 5,$contact, 'B', 1, 'L');

$pdf->Ln(10);
$pdf->Cell(70, 5,'User Credentials', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5,'Role', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(70, 5,$role, 'B', 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5,'Username', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(70, 5,$un, 'B', 1, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 5,'Password', 0, 0, 'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(70, 5,$pw, 'B', 1, 'L');

$pdf->SetFont('Arial', '', 10);


$pdf->Output();
?>