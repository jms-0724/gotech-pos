<?php
require("../connection.php");
if (isset($_POST['up_uname'])) {
    $uid = $_POST['uid'];
    $u_uname = $_POST['up_uname'];
    $u_pword = $_POST['up_pword'];
    $u_ulevel = $_POST['up_level'];
    $u_fname = $_POST['up_fname'];
    $u_lname = $_POST['up_lname'];

    $hashedPass = password_hash($u_pword, PASSWORD_BCRYPT); //encrypting the user
    // Prepare the SQL statement
    $statement = $conn->prepare("UPDATE tbl_user SET username = ?, password = ?, ulevel = ?, fname = ?, lname = ? WHERE uid = ?");
    
    // Bind parameters
    $statement->bind_param("sssssi", $u_uname, $hashedPass , $u_ulevel, $u_fname, $u_lname, $uid);

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
?>
