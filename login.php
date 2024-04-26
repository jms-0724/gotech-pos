<?php
session_start();
require("connection.php");

if (isset($_POST['uname'])){
    $uname = $_POST['uname'];
    $psword = $_POST['pword'];

    //Selects ALL records matching
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE username = '$uname' AND password='$psword'");  

    //Executes Statement
    $stmt->execute();
    $result = $stmt->get_result();

    //Function is executed when  recordset contains at least one row
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['uid'] = $row['uid'];
        $_SESSION[ 'username' ]= $row['username'];
        $ulevel = $row['ulevel'];
        $_SESSION['userlevel'] = $ulevel;

        //If-else for user levels
        if($ulevel = "Administrator"){
            echo "admin";
        } elseif ($ulevel === "Cashier") {
            echo "cashier";
        }
    }
}
?>