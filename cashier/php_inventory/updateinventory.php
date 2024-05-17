<?php
require("../connection.php");
if (isset($_POST['up_uname'])) {
    if($_FILES['addprod_photo']['error'] == 0){
        $typesallowed = array("image/jpeg", "image/jpg","image/png", "image/gif");
            if(in_array($_FILES['addprod_photo']['type'],$typesallowed)){
                //Upload Directory
                $uploadDir = "../product_images/";
                //Fetch Filename
                $filename = basename($_FILES['addprod_photo']['name']);
                $targetPath = $uploadDir . $filename;
                if(move_uploaded_file($_FILES["addprod_photo"]['tmp_name'], $targetPath)){
                    
                    $pid = $_POST['pid'];
                    $updprod_name = $_POST['updprod_name'];
                    $updprod_type = $_POST['updprod_type'];
                    $updprod_quantity = $_POST['updprod_quantity'];
                    $updprod_price = $_POST['updprod_price'];
                    $updprod_photo = $uploadDir . $filename;
                
                    // Prepare the SQL statement
                    $statement = $conn->prepare("UPDATE tbl_inventory SET prod_name = ?, prod_type = ?, prod_quantity = ?, prod_price = ?, prod_photo = ? WHERE prod_id = ?");
                    
                    // Bind parameters
                    $statement->bind_param("sssssi", $updprod_name, $updprod_type, $updprod_quantity, $updprod_price, $updprod_photo, $pid);
                
                    // Execute the statement
                    if ($statement->execute()) {
                        echo "success";
                    } else {
                        echo "failed";
                    }
                
                    // Close the statement
                    $statement->close();
                    // Close the connection
                    $conn->close();
                }
            }
    }

}
?>