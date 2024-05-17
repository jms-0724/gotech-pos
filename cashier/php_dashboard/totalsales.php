<?php
require ("./../connection.php");

$stmt = $conn->prepare("SELECT SUM(total_price) AS total_sales FROM tbl_transaction_details");
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?>
        <span><?=$row['total_sales']?></span>
        <?php
    }
} else {
    ?>
    <span>Result Not Found</span>
    <?php
}
?>
