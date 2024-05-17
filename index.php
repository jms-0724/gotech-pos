<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Page</title>
<link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="login.css">
<style>

</style>
</head>
<body>
<main class="login-container">
        <header class="login-header">
            <img src="./images/gotech_original.png" alt="Logo" class="logo">
            
        </header>
        <form method="POST" id="login">
            <div class="form-group">
                <label for="username"></label>
                <input type="text" id="uname" name="uname" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" id="pword" name="pword" placeholder="Password" required>
            </div>
            <div class="button">
                <button type="submit">Log in</button>
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
