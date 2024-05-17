<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Reports</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>

    </style>
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
                        <a href="admin.php" class="sidebar-link ">
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
                            Inventory Management
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="managetransact.php" class="sidebar-link">
                            Transaction Management
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard"
                            aria-expanded="false" aria-controls="dashboard">  
                           Report Generation
                        </a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="reportgen.php" class="sidebar-link">Sales Report</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="transactgen.php" class="sidebar-link">Transactions Report</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Component -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <!-- Button for sidebar toggle -->
                <button class="btn btn-dark" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-flex justify-content-start w-100"><h4 class="text-white">Report Generation</h4></div>
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
                        <!-- Section -->
                       
                        <section class="d-flex">
                            <div class="flex-grow-1">
                                <a href="./php_report/transactreport.php" class="btn btn-primary" target="_blank">Print All Transactions</a>
                            </div>
                            <div class="d-flex w-25">
                                <!-- <select name="" id="" class="form-select px-3 mx-3">
                                    <option value="" style="display: none;">Filter By</option>
                                    <option value=""></option>
                                </select> -->
                                <input type="text" name="search" id="searchTrans" class="form-control">
                        </section>
                        <section>
                            <div class="d-flex justify-content-center my-3">
                                <h3 class="text-white">Table of Transactions</h3>
                            </div>
                            <table class="table table-dark">
                                <thead>
                                    <th>Transaction ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Address</th>
                                    <th>Quantity Bought</th>
                                    <th>Total Price</th>
                                    <th>Cash Given</th>
                                </thead>
                                <tbody id="transBody">
                                    <!-- <tr>
                                        <td>TID-001</td>
                                        <td>Jean Merlau</td>
                                        <td>San Juan, La Union</td>
                                        <td>3</td>
                                        <td>PHP 6500.00</td>
                                        <td>PHP 7000.00</td>
                                    </tr> -->

                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="scripts/toggler.js"></script>
    <script src="scripts/reportgen2.js"></script>
    <script src="system/confirmlogout.js"></script>
    
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
        include("system/logoutmodal.php");
    ?>
</html>