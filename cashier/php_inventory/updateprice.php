<?php
require('./../connection.php');  // connect to the database
if (isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $updprod_price = $_POST['updprod_price'];
    
    $stmt = $conn->prepare("UPDATE tbl_inventory SET prod_price = ? WHERE prod_id=?");

    $stmt->bind_param('ss', $updprod_price, $pid);

    if($stmt->execute()) {
        echo "success";
    } else {
        echo "failed";
    }
}
?>