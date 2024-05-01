<?php
require('fpdf186/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('./../css/gotech.jpg',15,6,40,30);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,5,'GOTECH MICROBIZ',0,0,'L');
    // Line break
    $this->Ln(7);
    $this->SetFont("Arial", '', 8);
    $this->Cell(80);
    $this->Cell(30,3,'Baladad Bldg. Quezon Ave. Barangay III (POB.) 2500',0,0,'L');
    $this->Ln();
    $this->Cell(80);
    $this->Cell(30,3,'City of San Fernando (CAPITAL) La Union Philippines',0,0,'L');
    $this->Ln();
    $this->Cell(80);
    $this->SetFont("Arial", 'B', 8);
    $this->Cell(30,3,'Owned & Operated by: EXPIDENT MARKETING CORPORATION',0,0,'L');
    $this->Ln();
    $this->SetFont("Arial", '', 8);
    $this->Cell(80);
    $this->Cell(30,3,'VAT Reg TIN: 456-709-056-00001   Tel No. (+63) 9171650488',0,0,'L');
    $this->Ln(10);
   
}

function loadData(){

}
// Table Creation
function TransactTable($header){
$w = array('26','40','47','35','25','25');
for($i=0;$i<count($header);$i++)
    $this->Cell($w[$i],7,$header[$i],1,0,'C');
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(80);
$pdf->Cell(0, 10,'List of Transactions', 0, 0, 'L',false,'');
$pdf->Ln();
$pdf->SetFont('Arial','',11);
$header = array( "Transaction ID","Customer Name","Address","Quantity Bought","Total Price","Cash Given");
$pdf->TransactTable($header);
$pdf->Output();
?>