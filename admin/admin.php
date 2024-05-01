<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Main Page</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
<div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#"><img src="css/gotech.jpg" alt="" srcset="" height="100" width="200"></a>
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header fs-5">
                        Point of Sales System 
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link ">
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="manageuser.php" class="sidebar-link">
                            User Management
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="manageinventory.php" class="sidebar-link">
                            Inventory Management <span class="badge text-bg-secondary"></span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="managetransact.php" class="sidebar-link">
                            Transaction Management
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="reportgen.php" class="sidebar-link">
                            Report Generation
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom sticky-top">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex justify-content-end text-white w-100">
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
                        <div class="row mb-3">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                      <h5 class="card-title text-center">Total Products Sold Today</h4>
                                      <p class="card-text text-center h6" id="totalSold"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                      <h5 class="card-title text-center">Total Sales</h4>
                                      <p class="card-text text-center h6">PHP <span id="salesTotal"></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                      <h5 class="card-title text-center">Average Price of Transactions</h4>
                                      <p class="card-text text-center h6" id="productAve"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                      <h5 class="card-title text-center">Number of Transactions</h4>
                                      <p class="card-text text-center h6" id="transNum"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <!-- Chart -->
                                <center><h4 class="text-white">Product Category Distribution</h4></center>
                                <canvas id="barChart" class="canvas">

                                </canvas>
                            </div>
                            <div class="col">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- Javascript Sources -->
    <script src="./../node_modules/chart.js/dist/chart.umd.js"></script>
    <script src="scripts/dashboardcharts.js"></script>
    <script src="scripts/toggler.js"></script>
    <script src="system/confirmlogout.js"></script>
    <script src="scripts/dashboardscript.js"></script>
    
</body>
<?php
    include('system/logoutmodal.php');
?>
</html>