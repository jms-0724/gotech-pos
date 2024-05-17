<?php
    require_once("../connection.php"); //Connection to Database

    if(isset($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $conn->prepare("SELECT * FROM tbl_inventory WHERE prod_id LIKE '%$search%' OR prod_name LIKE '%$search%' OR prod_type LIKE '%$search%'");

    } else {
        $stmt = $conn->prepare("SELECT * FROM tbl_inventory");
    }
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        ?>
        <!-- Display data in the option-->
            <option value="<?= $row['prod_name']?>"><?= $row['prod_name']?></option>
        <?php
    } 
} else {
    ?>
        <div>No  Results Found</div>
    <?php
}
?>
