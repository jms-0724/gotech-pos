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
        <!-- Display data in the table-->
            <tr>
            <td><?= $row['prod_id']?></td>
            <td><a href="<?= "Point_of_Sales/" . $row['prod_photo']?>" target="_blank"><img src="<?= "admin/" . $row['prod_photo']?>" alt="..." width="100" height="100"></a></td>
            <td><?= $row['prod_name']?></td>
            <td><?= $row['prod_type']?></td>
            <td><?= $row['prod_quantity']?></td>
            <td><?= $row['prod_price']?></td>
            <!-- <td><div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Actions
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" onclick="editPrice(<?= $row['prod_id']?>)">Update Price</a></li>
                        <li><a class="dropdown-item" onclick="editProducts(<?= $row['prod_id']?>)">Update Details</a></li>
                    </ul>
                </div>
            </td> -->
            <!-- <td><button type="button" class="btn btn-outline-primary" id="btnEdit" onclick="editProducts(<?= $row['prod_id'] ?>)">Edit</button></td> -->
            </tr>
            
        <?php
    } 
} else {
    ?>
        <tr>
            <center>
            <td colspan="6">No Products Found</td>
            </center>
        </tr>
    <?php
}
?>
