<?php
require ("./../connection.php");

$stmt = $conn->prepare("SELECT ROUND(AVG(total_price),2) AS avg_price FROM tbl_transaction_details");
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?>
        <span><?=$row['avg_price']?></span>
        <?php
    }
} else {
    ?>
    <span>Result Not Found</span>
    <?php
}
?>
