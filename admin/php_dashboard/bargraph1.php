<?php
require ("./../connection.php");

$stmt = $conn->prepare("SELECT COUNT(*) AS count FROM tbl_transaction_details INNER JOIN tbl_inventory ON tbl_transaction_details.prod_id = tbl_inventory.prod_id GROUP BY tbl_inventory.prod_type");
$stmt->execute();
$result = $stmt->get_result();

$data = [
    'values' => [],
];

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        $data['values']= $row['count'];
    }
    echo json_encode($data);

} else {
    echo json_encode(['labels' => [], 'values' => []]);

}
?>
