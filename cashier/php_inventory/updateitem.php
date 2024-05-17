<?php
require('./../connection.php');  // connect to the database
if (isset($_POST['updprod_name'])){
    $pid = $_POST['updprod_name'];
    $updprod_quantity = $_POST['updprod_quantity'];
   
    $sql2 = $conn->prepare("SELECT * FROM tbl_inventory WHERE prod_name=?");
    $sql2->bind_param("s",$pid);
    $sql2->execute();
    $result = $sql2->get_result();
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $oldquantity = $row["prod_quantity"];
            $newquantity = intval($updprod_quantity) +  intval($oldquantity);

            $stmt = $conn->prepare('UPDATE tbl_inventory SET prod_quantity = ? WHERE  prod_name=?');

            $stmt->bind_param('is', $newquantity, $pid);

            if($stmt->execute()) {
                echo "success";
            } else {
                echo "failed";
             }
        }
    } else {
        echo "No Items Found";
    }
    
    
}
?>