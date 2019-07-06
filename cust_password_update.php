<?php

session_start();
include('admin/config.php');

if(isset($_POST['submit'])){

	$customer_id    = $_SESSION['id'];
	$cust_password  = $_POST['cust_password']; 
	$cust_password1 = $_POST['cust_password1'];

	if($cust_password == $cust_password1){

		$sql = "UPDATE customer SET cust_password='$cust_password' where customer_id='$customer_id'";
		$query = mysqli_query($con, $sql);

		if($query == true){
			header("location: cust_login_data.php?pass_msg=1");
			exit();
		} else {
			header("location: cust_login_data.php?pass_err=2");
			exit();
		}
	} else {
		header("location: cust_login_data.php?pass_do_not_match=3");
	}
}

?>