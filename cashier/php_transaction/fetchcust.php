<?php
require("../connection.php");

if(isset($_POST['cid'])){
	$c_id=$_POST['cid'];
	$sql="SELECT * FROM tbl_customer WHERE cust_id = '$c_id'";
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