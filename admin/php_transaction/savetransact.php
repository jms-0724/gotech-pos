<?php
require("./../connection.php");
//extract json from fetch
$data = file_get_contents('php://input'); 

$jsondecoded = json_decode( $data , true );
$datetoday = date('Y/m/d');
if(isset($jsondecoded['cust_id'])){
    //get decoded JSON from $jsondecode variable
    $conn->autocommit(false);

    try {
        $cust_id = $jsondecoded['cust_id'];
        $total_purchase = $jsondecoded['total_purchase'];
        $total_quantity = $jsondecoded['totalQuantity'];
        // Variables for total payment
        $cashgiven = $jsondecoded['cashgiven'];
        $change = $jsondecoded['change'];
        $date = date("Y/m/d");
        // Execute Payment Query First
        $payment_query = $conn->prepare("INSERT INTO tbl_payment(money_tendered, amount_left) VALUES(?,?)");
        $payment_query->bind_param('ii', $cashgiven, $change);
        $payment_query->execute();
        $payment_id = $conn->insert_id;
    
        // Execute tbl_transaction query second
        $trans_query = $conn->prepare("INSERT INTO tbl_transaction(cust_id, transact_date, payment_id, total_trans, total_quantity) VALUES (?,?,?,?,?)");
        $trans_query->bind_param('isiii', $cust_id, $date, $payment_id, $total_purchase, $total_quantity);
        $trans_query->execute();
        $last_id = $conn->insert_id;
    
        foreach($jsondecoded['product_info'] as $item){
            $prod_id = $item['prod_id'];
            $qpurchased = $item['quantity'];
            $price_item = $item['price_item'];
            $total_cost = $item['total_cost'];
             // Select products
            $stmt2 = $conn->prepare("SELECT * FROM tbl_inventory WHERE prod_id = ?");
            $stmt2->bind_param('s',$prod_id);
            $stmt2->execute();
            $results = $stmt2->get_result();
                // Get Results
            if($results->num_rows > 0){
            while($row = $results->fetch_assoc()){
                $oldquantity = $row['prod_quantity'];
                $Nquantity = $oldquantity - $qpurchased;
                // Validate if There is a low inventory of products
                    if($oldquantity >=  $qpurchased){

                        //Insert Transaction Details
                        $trans_detail = $conn->prepare("INSERT INTO tbl_transaction_details(transact_id, prod_id, quantity_purchased, price_per_item, total_price) VALUES (?,?,?,?,?)");
                        $trans_detail->bind_param("ssiss",$last_id,$prod_id,$qpurchased,$price_item,$total_cost);
                        //Update Transaction Details
                        $update_quantity = $conn->prepare('UPDATE tbl_inventory SET prod_quantity = ? WHERE  prod_id=?');
                        $update_quantity->bind_param('is',$Nquantity,$prod_id);
                        if($trans_detail->execute() && $update_quantity->execute()){
                            echo "success";
                        } else {
                            echo "failed";
                        }
                    } else {
                        echo "Low Inventory";
                    }
                }
            } else {
                echo "No Results";
            }
        }
        $conn->commit();
    } catch (Exception $th) {
        $conn->rollback();
        echo "$th";
    }

  

}

?>