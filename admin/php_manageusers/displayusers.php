<?php
    require_once("../connection.php"); //Connection to Database

    if(isset($_POST['search'])) {
        $search = $_POST['search'];
        $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE username LIKE '%$search%' OR fname LIKE '%$search%' OR lname LIKE '%$search%'");

    } else {
        $stmt = $conn->prepare("SELECT * FROM tbl_user");
    }
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <td><?= $row['username'] ?></td>
                <td><?= $row['ulevel'] ?></td>
                <td><?= $row['fname'] ?></td>
                <td><?= $row['lname'] ?></td>
                <td><button type="button" class="btn btn-outline-primary" id="editUser" onclick="editUser(<?= $row['uid']; ?>)">Edit</button></td>


            </tr>
        <?php
    } 
} else {
    ?>
        <td colspan="4">No Records Found!</td>
    <?php
}
?>
