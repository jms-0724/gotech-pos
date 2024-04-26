<?php
    require('../connection.php');

    if(isset($_POST['Cfname'])){

        $stmt = $conn->prepare("INSERT INTO tbl_customer (cust_fname, cust_lname, cust_brgy, cust_municipality, cust_province) VALUES(?,?,?,?,?)");

        if (!$stmt) {
            echo "NO SQL Prepared";
        }

        $cust_fname = $_POST['Cfname'];
        $cust_lname = $_POST['Clname'];
        $cust_brgy = $_POST['Cbrgy'];
        $cust_mun = $_POST['Cmun'];
        $cust_prov = $_POST['Cprov'];

        $stmt->bind_param("sssss", $cust_fname, $cust_lname, $cust_brgy, $cust_mun, $cust_prov); 

        if($stmt->execute()){
            echo "success";
        } else {
            echo "failed";
        }
        
        $stmt->close();
        $conn->close();
    }
?>