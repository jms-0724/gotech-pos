<?php
require("./connection.php");
if (isset($_POST['useName'])) {
    $useName = $_POST['useName'];
    $pass2 = $_POST['pass2'];

    // Prepare the SQL statement
    $statement = $conn->prepare("UPDATE tbl_user SET password = ?, WHERE username = ?");
    $hashedpass = password_hash($pass2, PASSWORD_BCRYPT);
    // Bind parameters
    $statement->bind_param("ss",$pass2,$useName);

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
