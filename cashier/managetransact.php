<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Window</title>
    <link rel="stylesheet" href="css/modalstyle.css">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#"><img src="css/gotech.jpg " alt="" srcset="" height="100" width="200"></a>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header fs-5">
                        Point of Sales System 
                    </li>
                    <li class="sidebar-item">
                        <a href="cashier.php" class="sidebar-link ">
                            Dashboard
                        </a>
                    </li>
    
                    <li class="sidebar-item">
                        <a href="managetransact.php" class="sidebar-link">
                            Transaction Management
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="manageinventory.php" class="sidebar-link">
                            View Available Products
                        </a>
                    </li>
                    
                </ul>
            </div>
        </aside>
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom" id="topsticky">
                <!-- Button for sidebar toggle -->
                <button class="btn btn-dark" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex justify-content-start w-100"><h4 class="text-white">Transaction Management</h4></div>
                <div class="d-flex justify-content-end w-100 text-white">
                <a data-bs-target="#log_out" data-bs-toggle="modal">
                    <span class="mx-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                </svg></a>
                    <p class="h5">User logged in as <span><?= $_SESSION['userlevel']. "" ?></span> <span><?= $_SESSION[ 'username' ]?></span></p>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <div class="">
                                
                        </div>
                        <section class="row">
                            <div class="col-8">
                            <table id="transact" class="table table-dark">
                                <thead>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Product Type</th>
                                    <th>Quantity</th>
                                    <th>Product Price</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                </thead>
                                <tbody class="transBody">
        
                                </tbody>
                            </table>
                            </div>
                        <div class="col-4">
                            <div class="card pos-right vh-100">
                                <div class="d-flex justify-content-center">
                                    <img src="css/shopping_cart.jpg" alt="" srcset="" width="100" height="100">
                                </div>
                                
                                <div class="card-body">
                                    <div class="d-grid w-100 mb-2">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewProds">Add Products</button>
                                    </div>
                                    <div class="d-grid w-100 mb-3">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewCust">List of Customers</button>
                                    </div>
                                    <div>
                                    <h4>Transaction Information</h4>
                                    <p>Total Items Purchased: <span id="quantity"></span></p>
                                    <p>Amount to Pay: ₱ <span id="totalPurchase"></span></p>
                                    </div>
                                    <div class="d-flex">
                                        Customer No. 
                                        <span id="custnum"></span>
                                    </div>
                                    <div class="d-flex mt-2">
                                        Customer Name: 
                                        <span id="custfname"></span>, <span id="custlname"></span>
                                    </div>
                                    <div class="d-flex mt-2">
                                        Customer Address: 
                                        <p><span id="custbrgy"></span>, <span id="custmun">, </span> <span id="custprov"></p>
                                        
                                    </div>
                                    <div class="d-grid my-2">
                                        <button type="button" id="payCust" class="btn btn-lg btn-primary" >Pay</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                     <!-- data-bs-toggle="modal" data-bs-target="#payModal" -->
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <script src="scripts/toggler.js"></script>
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/jquery-3.7.1.min.js"></script>
    <script src="scripts/transactscript.js"></script>
    <script src="system/confirmlogout.js"></script>

</body>
<?php
    include("php_transaction/managemodals.php");
    include("system/logoutmodal.php");
    include("php_transaction/statusmodals.php");
?>
</html>