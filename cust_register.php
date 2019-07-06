<?php

//connection 
include('admin/config.php');

if (isset($_POST['submit'])) {
	
	$cust_first_name   = $_POST['cust_first_name'];
	$cust_last_name    = $_POST['cust_last_name'];
	$cust_email_id     = $_POST['cust_email_id'];
	$cust_mobile       = $_POST['cust_mobile'];
	$cust_username     = $_POST['cust_username'];
	$cust_password     = $_POST['cust_password'];
	$cust_password_2   = $_POST['cust_password_2'];

	if ($cust_password == $cust_password_2) {
		
		$sql = "INSERT INTO customer (cust_first_name, cust_last_name, cust_email_id, cust_mobile, cust_username, cust_password)
		         VALUES
		         ('$cust_first_name', '$cust_last_name', '$cust_email_id', '$cust_mobile','$cust_username', '$cust_password')";
		$query = mysqli_query($con, $sql);

		if ($query == true) {
			header("location: thankyou.php?cust_name=$cust_first_name");
		} else {
			header("location: customer_login.php?pass_err_regis=2");
		}
	} else {
		header("location: customer_login.php?pass_err_regis=2");
	}
}