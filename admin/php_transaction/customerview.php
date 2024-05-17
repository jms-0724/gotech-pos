<?php

require_once("../connection.php"); //Connection to Database

if(isset($_POST['searchCust'])) {
    $search = $_POST['searchCust'];
    $stmt = $conn->prepare("SELECT * FROM tbl_customer WHERE cust_id LIKE '%$search%' OR cust_fname LIKE '%$search%' OR cust_lname LIKE '%$search%'");
} else {
    $stmt = $conn->prepare("SELECT * FROM tbl_customer");
}
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
    ?>
    <!-- Display data in the table-->
        <tr>
        <td><?= $row['cust_fname']?> <?= $row['cust_lname']?> </td>
        <td><?= $row['cust_brgy']?> <?= $row['cust_municipality']?> <?= $row['cust_province']?></td>
        <td><button type="button" class="btn btn-outline-primary" id="addtoTrans" onclick="placeCustomer(<?= $row['cust_id']?>)">Place Customer</button></td>
        </tr>
    <?php
} 
} else {
?>
    <tr>
        <td colspan="3">No Customers Found</td>
    </tr>
<?php
}
?>

