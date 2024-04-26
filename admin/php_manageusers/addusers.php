<?php
    require('../connection.php');

    if(isset($_POST['adduname'])){

        $stmt = $conn->prepare("INSERT INTO tbl_user (username, password, ulevel, fname, lname) VALUES(?,?,?,?,?)");

        if (!$stmt) {
            echo "NO SQL Prepared";
        }

        $uname = $_POST['adduname'];
        $pword = $_POST['addpword'];
        $ulevel = $_POST['add_level'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];

        $stmt->bind_param("sssss", $uname, $pword, $ulevel, $fname, $lname); 

        if($stmt->execute()){
            echo "success";
        } else {
            echo "failed";
        }
        
        $stmt->close();
        $conn->close();
    }
?>