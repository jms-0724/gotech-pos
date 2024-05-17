<?php
require('fpdf186/fpdf.php');
require('./../connection.php');

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
function TransactTable($header, $data){
$w = array('26','40','76','35','25','25');
for($i=0;$i<count($header);$i++)
    $this->Cell($w[$i],7,$header[$i],1,0,'C');
$this->Ln();
$fill = false;
foreach($data as $row){
    $this->Cell($w[0],6,$row['transact_id'],'LR');
    $this->Cell($w[1],6,$row['cust_fname'] . "," .  $row['cust_lname'],'LR');
    $this->Cell($w[2],6,$row['cust_brgy'] . ", " . $row['cust_municipality'] . ", " . $row['cust_province'],'LR');
    $this->Cell($w[3],6,$row['total_quantity'],'LR');
    $this->Cell($w[4],6,$row['total_trans'],'LR');
    $this->Cell($w[5],6,$row['money_tendered'],'LR');
    $this->Ln();
    $fill = !$fill;
    }
    $this->Cell(array_sum($w),0,'','T');
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
$pdf = new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(80);
$pdf->Cell(0, 10,'List of Transactions', 0, 0, 'L',false,'');
$pdf->Ln();
$pdf->SetFont('Arial','',11);
$header = array( "Transaction ID","Customer Name","Address","Quantity Bought","Total Price","Cash Given");
$sql = "SELECT * FROM tbl_transaction INNER JOIN tbl_customer ON tbl_transaction.cust_id = tbl_customer.cust_id INNER JOIN tbl_transaction_details ON tbl_transaction.transact_id = tbl_transaction_details.transact_id INNER JOIN tbl_payment ON tbl_transaction.payment_id = tbl_payment.payment_id";
$data = $conn->query($sql);
$pdf->TransactTable($header,$data);
$pdf->Output();
?>