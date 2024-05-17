<?php
session_start();
require("connection.php");

if (isset($_POST['uname']) && isset($_POST['pword'])) {
    $uname = $_POST['uname'];
    $psword = $_POST['pword'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE username = ?");  

    // Bind parameters
    $stmt->bind_param("s", $uname);

    // Execute statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if there's a matching user
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        
        // Verify the password
        if (password_verify($psword, $hashed_password)) {
            $_SESSION['uid'] = $row['uid'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['userlevel'] = $row['ulevel'];

            // Use strict comparison
            if ($row['ulevel'] === "Administrator") {
                echo "admin";
            } elseif ($row['ulevel'] === "Cashier") {
                echo "cashier";
            }
        } else {
            // Incorrect password
            echo "Incorrect password";
        }
    } else {
        // No matching user
        echo "User not found";
    }
} else {
    // Invalid request
    echo "Invalid request";
}
?>
