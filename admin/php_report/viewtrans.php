<?php
    require_once("../connection.php"); //Connection to Database

    if(isset($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $conn->prepare("SELECT * FROM tbl_transaction INNER JOIN tbl_customer ON tbl_transaction.cust_id = tbl_customer.cust_id INNER JOIN tbl_transaction_details ON tbl_transaction.transact_id = tbl_transaction_details.transact_id INNER JOIN tbl_payment ON tbl_transaction.payment_id = tbl_payment.payment_id WHERE tbl_customer.cust_fname LIKE '%$search%' ");

    } else {
        $stmt = $conn->prepare("SELECT * FROM tbl_transaction INNER JOIN tbl_customer ON tbl_transaction.cust_id = tbl_customer.cust_id INNER JOIN tbl_transaction_details ON tbl_transaction.transact_id = tbl_transaction_details.transact_id INNER JOIN tbl_payment ON tbl_transaction.payment_id = tbl_payment.payment_id");
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?=$row['transact_id']?></td>
                <td><?=$row['cust_fname']?> <?=$row['cust_lname']?></td>
                <td><?=$row['cust_brgy']?> <?=$row['cust_municipality']?> <?=$row['cust_province']?></td>
                <td><?=$row['total_quantity']?></td>
                <td><?=$row['total_trans']?></td>
                <td><?=$row['money_tendered']?></td>
                
            </tr>
        <?php
    } 
} else {
    ?>
        <td colspan="6">No Records Found!</td>
    <?php
}
?>
