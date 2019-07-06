<?php

//session start
session_start();

//connection
include('admin/config.php');

if (isset($_POST['submit'])) {
	 
	 $cust_username  = $_POST['cust_username'];
	 $cust_password  = $_POST['cust_password'];
	 $varification   = $_POST['varification'];
	 $code = "9";

	 if($varification == $code ){

	 	$sql = "SELECT * FROM customer where cust_username='$cust_username' and cust_password='$cust_password'";
	 	$query = mysqli_query($con, $sql);
	 	$row = mysqli_fetch_assoc($query);

	 	$_SESSION['id'] = $row['customer_id'];

	 	if($row == true){
	 		header("location: index.php");
	 	} else {
	 		header("location: customer_login.php?pass_err=1");
	 	}
	 } else {
	 	header("location: customer_login.php?var_err=2");
	 }

}
?>