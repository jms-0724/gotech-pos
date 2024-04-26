<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./index.css">
    <script src="forgot.js"></script>
</head>
<body class="">
    <div class="container-fluid">
        <main class="row">
            <section class="col divfill vh-100">
                
                
            </section>
            <section class="col border shadow border-primary" id="section2Div">
                <div>
                    <div class="d-flex justify-content-center py-3">
                        <img src="images/gotech.jpg" alt="" srcset="" height="100px" width="100px">
                    </div>
                   <div class="d-flex justify-content-center">
                        <h3>Update your Password</h3>
                   </div>
                   <div class="d-flex justify-content-center">
                        <form id="forgot">
                            <label for="" class="form-label">Username</label>
                            <input type="text" name="use" id="use" class="form-control">
                            <label for="" class="form-label">Password</label>
                            <input type="password" name="" id="pass1" class="form-control">
                            <label for="" class="form-label">Re Enter your Password</label>
                            <input type="password" name="" id="pass2" class="form-control">
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                                <button type="reset" class="btn btn-danger">Clear</button>
                            </div>
                            
                        </form>
                   </div>
                   
                </div>
    
            </section>
        </main>
    </div>

    <?php
        include("./statusmodals.php");
    ?>

</body>
</html>