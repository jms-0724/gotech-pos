<?php
    require_once("../connection.php"); //Connection to Database

    if(isset($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $conn->prepare("SELECT tbl_transaction.transact_date, SUM(tbl_transaction_details.total_price) AS 'Total Sales', SUM(tbl_transaction.total_quantity) AS 'Total Sold', AVG(tbl_transaction_details.total_price) AS 'Average Prices', AVG(tbl_transaction.total_quantity) AS 'Average Quantity' FROM tbl_transaction INNER JOIN tbl_transaction_details ON tbl_transaction.transact_id = tbl_transaction_details.transact_id WHERE tbl_transaction.transact_date LIKE '%$search%' GROUP BY tbl_transaction.transact_date");

    } else {
        $stmt = $conn->prepare("SELECT tbl_transaction.transact_date, SUM(tbl_transaction_details.total_price) AS 'Total Sales', SUM(tbl_transaction.total_quantity) AS 'Total Sold', AVG(tbl_transaction_details.total_price) AS 'Average Prices', AVG(tbl_transaction.total_quantity) AS 'Average Quantity' FROM tbl_transaction INNER JOIN tbl_transaction_details ON tbl_transaction.transact_id = tbl_transaction_details.transact_id GROUP BY tbl_transaction.transact_date");
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?=$row['transact_date']?></td>
                <td><?=$row['Total Sales']?></td>
                <td><?=$row['Total Sold']?></td>
                <td><?=$row['Average Prices']?></td>
                <td><?=$row['Average Quantity']?></td>
            </tr>
        <?php
    } 
} else {
    ?>
        <td colspan="5">No Records Found!</td>
    <?php
}
?>
