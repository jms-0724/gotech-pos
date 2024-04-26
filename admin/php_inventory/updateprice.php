<?php
require('./../connection.php');  // connect to the database
if (isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $updprod_quantity = $_POST['updprod_quantity'];
    $updprod_price = $_POST['updprod_price'];
    
    $stmt = $conn->prepare("UPDATE tbl_inventory SET prod_quantity = ?, prod_price = ? WHERE prod_id=?");

    $stmt->bind_param('sss', $updprod_quantity, $updprod_price, $pid);

    if($stmt->execute()) {
        echo "success";
    } else {
        echo "failed";
    }
}
?>