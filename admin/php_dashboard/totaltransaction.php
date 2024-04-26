<?php
require ("./../connection.php");

$stmt = $conn->prepare("SELECT COUNT(*) AS total_transactions FROM tbl_transaction");
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        ?>
        <span><?=$row['total_transactions']?></span>
        <?php
    }
} else {
    ?>
    <span>Result Not Found</span>
    <?php
}
?>
