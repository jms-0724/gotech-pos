<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="login.css">

</head>
<body>
    <main class="login-container" id="poppins">
        <h2>LOGIN</h2>
        <form method="POST" id="login">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="uname" name="uname" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="pword" name="pword" placeholder="Enter your password"required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            <div class="forgot-password">
                <a href="forgot.php">Forgot password?</a>
            </div>
        </form>
    </main>
    <script src="login.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
    <?php
      include("failed.php");
    ?>
</body>

</html>
