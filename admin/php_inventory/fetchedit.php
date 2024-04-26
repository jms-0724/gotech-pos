<?php
require("../connection.php");

if(isset($_POST['pid'])){
	$p_id=$_POST['pid'];
	$sql="SELECT * FROM tbl_inventory WHERE prod_id = '$p_id'";
	$result=$conn->query($sql);
	$response=array();
	foreach ($conn->query($sql) as $row) {
		$response=$row;
	}
	echo json_encode($response);
}
else
{
	$response['status']=200; //200 means ok
	$response['message']="Invalid or data not found";
}


?>