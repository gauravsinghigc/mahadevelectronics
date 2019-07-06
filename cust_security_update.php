<?php

session_start();
include('admin/config.php');

if(isset($_POST['submit'])){

	$customer_id    = $_SESSION['id'];
	$cust_email_id  = $_POST['cust_email_id'];
	$cust_mobile    = $_POST['cust_mobile']; 
	$cust_username  = $_POST['cust_username'];

    $sql = "UPDATE customer SET cust_email_id='$cust_email_id', cust_mobile='$cust_mobile', cust_username='$cust_username' where customer_id='$customer_id'";
    $query = mysqli_query($con, $sql);

    if ($query == true) {
    	
    	header("location: cust_login_data.php?login_update_msg=1");
    } else {
    	header("location: cust_login_data.php?login_update_err=2");
    }
}