<?php
require('./../connection.php');  // connect to the database
if (isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $updprod_name = $_POST['updprod_name'];
    $updprod_type = $_POST['updprod_type'];
    
     // Prepare the SQL statement
     $stmt = $conn->prepare("UPDATE tbl_inventory SET prod_name = ?, prod_type = ? WHERE prod_id = ?");
                    
     // Bind parameters
     $stmt->bind_param("sss", $updprod_name, $updprod_type, $pid);

    if($stmt->execute()) {
        echo "success";
    } else {
        echo "failed";
    }
}
?>