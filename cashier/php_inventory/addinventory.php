<?php
    require_once('../connection.php');
    if(isset($_POST['addprod_name'])){
        if($_FILES['addprod_photo']['error'] == 0){
            $typesallowed = array("image/jpeg", "image/jpg","image/png", "image/gif");
            if(in_array($_FILES['addprod_photo']['type'],$typesallowed)){
                //Upload Directory
                $uploadDir = "../../product_images/";
                //Fetch Filename
                $filename = basename($_FILES['addprod_photo']['name']);
                $targetPath = $uploadDir . $filename;
                if(move_uploaded_file($_FILES["addprod_photo"]['tmp_name'], $targetPath)) {
                    $stmt = $conn->prepare("INSERT INTO tbl_inventory (prod_name, prod_type, prod_quantity, prod_price, prod_photo) VALUES(?,?,?,?,?)");

                    if (!$stmt) {
                        echo "NO SQL Prepared";
                    }
            
                    $pname = $_POST['addprod_name'];
                    $ptype = $_POST['addprod_type'];
                    $pquantity = $_POST['addprod_quantity'];
                    $price = $_POST['addprod_price'];
                    $pphoto = $uploadDir . $filename;
            
                    $stmt->bind_param("ssiss", $pname, $ptype, $pquantity, $price, $pphoto); 
            
                    if($stmt->execute()){
                        echo "success";
                    } else {
                        echo "failed";
                    }
                    $stmt->close();
                    $conn->close();
                }
            } else {
                echo "Only JPEG, GIF, JPG AND PNG files are allowed";
            }
        }
    }
?>