<?php
require('fpdf186/fpdf.php');
require_once("../connection.php");

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


// Table Creation
function CreateTable($header, $data){
$w = array('30','40','40','40','40');
for($i=0;$i<count($header);$i++)
    $this->Cell($w[$i],7,$header[$i],1,0,'C');
$this->Ln();
$fill = false;
foreach($data as $row){
    $this->Cell($w[0],6,$row[0],'LR');
    $this->Cell($w[1],6,$row[1],'LR');
    $this->Cell($w[2],6,$row[2],'LR');
    $this->Cell($w[3],6,$row[3],'LR');
    $this->Cell($w[4],6,$row[4],'LR');
    $this->Ln();
    $fill = !$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
}

}

// Instanciation of inherited class
$pdf = new PDF();
$sql = "SELECT tbl_transaction.transact_date, ROUND(SUM(tbl_transaction_details.total_price),2) AS 'Total Sales', SUM(tbl_transaction.total_quantity) AS 'Total Sold', ROUND(AVG(tbl_transaction_details.total_price),2) AS 'Average Prices', ROUND(AVG(tbl_transaction.total_quantity),2) AS 'Average Quantity' FROM tbl_transaction INNER JOIN tbl_transaction_details ON tbl_transaction.transact_id = tbl_transaction_details.transact_id GROUP BY tbl_transaction.transact_date";
$header = array('Date','Total Revenue','Total Units Sold','Average Price','Average Purchased');
// $result = $conn->query($sql);
// $data = array();
// while($row = $result->fetch_assoc()){
//     $data[]=$row;
// }
$data = $conn->query($sql)->fetch_all(PDO::FETCH_NUM);
$pdf->AliasNbPages();
$pdf->AddPage();    
$pdf->SetFont('Arial','',12);
$pdf->Cell(80);
$pdf->Cell(0, 10,'List of Daily Sales', 0, 0, 'L',false,'');
$pdf->Ln();

$pdf->CreateTable($header,$data);
$pdf->Output();
?>