<?php
require ("./../connection.php");

$stmt = $conn->prepare("SELECT COUNT(*) AS product_sold FROM tbl_transaction_details");
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?>
        <span><?=$row['product_sold']?></span>
        <?php
    }
} else {
    ?>
    <span>Result Not Found</span>
    <?php
}
?>
