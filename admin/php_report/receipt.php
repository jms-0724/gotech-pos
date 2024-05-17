<?php
session_start();
require("fpdf186/fpdf.php");
require("./../connection.php");


class PDF extends FPDF {
    function Header(){
    // Logo
    $this->Image('./../css/gotech.jpg',15,6,40,30);
    // Arial bold 15
    // Move to the right
    $this->SetFont('Arial','B',12);
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

    function InvoiceTable($header, $data){
    $w = array(30, 70, 35, 40);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->SetFont("Arial", '', 8);
         $this->Cell($w[0],6,$row['quantity_purchased'],'LR');
         $this->Cell($w[1],6,$row['prod_name'],'LR');
        $this->Cell($w[2],6,number_format($row['price_per_item']),'LR',0,'R');
         $this->Cell($w[3],6,number_format($row['total_price']),'LR',0,'R');
        $this->Ln();
     }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
    }
}
$pdf = new PDF();
$pdf -> AddPage();
$trans_id = $_SESSION['transact_id'];
$cust_id = $_SESSION['customer'];
$sql2 = $conn->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
$sql2->bind_param("s",$cust_id);
$sql2->execute();
$result2 = $sql2->get_result();
$data2 = $result2->fetch_assoc();
// 
$sql3 =  $conn->prepare("SELECT * FROM tbl_transaction WHERE transact_id=?");
$sql3->bind_param("s",$trans_id);
$sql3->execute();
$result3 = $sql3->get_result();
$data3 = $result3->fetch_assoc();

// 
$sql4 =  $conn->prepare("SELECT * FROM tbl_transaction INNER JOIN tbl_payment ON tbl_transaction.payment_id = tbl_payment.payment_id WHERE transact_id=?");
$sql4->bind_param("s",$trans_id);
$sql4->execute();
$result4 = $sql4->get_result();
$data4 = $result4->fetch_assoc();

$pdf->SetFont('arial', 'B', 12);
$pdf->Cell(40,10,'SALES INVOICE','',0,'L',false,'');
$pdf->Cell(40,10,'',0);
$pdf->Cell(65,10,'No.' . $trans_id,0,0,'L',false,'');
// $pdf->Cell(20,10,'',0);
$pdf->Cell(20,10,'Date: ' . $data3['transact_date'] ,0,0,'L',false,'');
$pdf->Ln();
$pdf->Cell(20,7,'Sold to:' . $data2['cust_fname'] . ",  " . $data2['cust_lname'],0,0,'L',false,'');
$pdf->Ln(5);
$pdf->Cell(20,7,'TIN:',0,0,'L',false,'');
$pdf->Ln(5);
$pdf->Cell(20,7,'Address:' . $data2['cust_brgy']. ", " .$data2['cust_municipality'] . ", " . $data2['cust_province'] ,0,0,'L',false,'');
$pdf->Ln(10);


$header = array('Qty','Articles','U-Price','Amount');
$sql = $conn->prepare("SELECT * FROM tbl_transaction_details INNER JOIN tbl_inventory ON tbl_transaction_details.prod_id = tbl_inventory.prod_id WHERE tbl_transaction_details.transact_id=?");
$sql->bind_param("s",$trans_id);
$sql->execute();
$result = $sql->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);
// Invoice Table
$pdf->InvoiceTable($header, $data);

$pdf->SetFont('Arial','B',12);
$pdf->Ln(10);
$pdf->Cell(20,10,'Total Price of Product Bought:' . $data3['total_trans'] ,'',0,'L',false,'');
$pdf->Output();


?>