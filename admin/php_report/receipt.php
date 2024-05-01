<?php
require("fpdf186/fpdf.php");


class PDF extends FPDF {
    function Header(){
    // Logo
    $this->Image('img/gotech.jpg',15,6,40,30);
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

    function InvoiceTable($header){
    $w = array(30, 60, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    // foreach($data as $row)
    // {
    //     $this->Cell($w[0],6,$row[0],'LR');
    //     $this->Cell($w[1],6,$row[1],'LR');
    //     $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
    //     $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
    //     $this->Ln();
    // }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
    }
}
$pdf = new PDF();
$pdf -> AddPage();
$pdf->SetFont('arial', 'B', 12);
$pdf->Cell(40,10,'SALES INVOICE','',0,'L',false,'');
$pdf->Cell(40,10,'',0);
$pdf->Cell(65,10,'No  06991',0,0,'L',false,'');
// $pdf->Cell(20,10,'',0);
$pdf->Cell(20,10,'Date',0,0,'L',false,'');
$pdf->Ln();
$pdf->Cell(20,7,'Sold to:',0,0,'L',false,'');
$pdf->Ln(5);
$pdf->Cell(20,7,'TIN:',0,0,'L',false,'');
$pdf->Ln(5);
$pdf->Cell(20,7,'Address:',0,0,'L',false,'');
$pdf->Ln(10);
$header = array('Qty','Articles','U-Price','Amount');
$pdf->InvoiceTable($header);
$pdf->Output();

?>