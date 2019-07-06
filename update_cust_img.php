<?php

session_start();
include('admin/fun.php');

if (isset($_POST['submit'])) {

	$customer_id = $_SESSION['id'];
	$customer_img = $_FILES['customer_img']['name'];
	$tmp_name = $_FILES['customer_img']['tmp_name'];
	$dir = "admin/img/cust_img/";
	move_uploaded_file($_FILES['customer_img']['tmp_name'], $dir.$customer_img);

	$sql = "UPDATE customer SET cust_img='$customer_img' where customer_id='$customer_id'";
	$query = mysqli_query($con, $sql);

	if ($query == true) {
		header("location: cust_basic_details.php?update_img_msg=1");
	} else {
		header("location: cust_basic_details.php?update_img_err=2");
	}
}

?>