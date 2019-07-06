<?php 

session_start();
include('admin/config.php');

if(isset($_POST['submit'])){

	$address_id              = $_GET['address_id'];
	$cust_address             = $_POST['cust_address'];
	$cust_pincode             = $_POST['cust_pincode'];
	$cust_city                = $_POST['cust_city'];
	$cust_state               = $_POST['cust_state'];
	$cust_country             = $_POST['cust_country'];
	$cust_nearby              = $_POST['cust_nearby'];
	$cust_delivery_contact    = $_POST['cust_delivery_contact'];
	$cust_delivery_contact_no = $_POST['cust_delivery_contact_no'];

	$sql = "UPDATE cust_addresses SET cust_address='$cust_address',
	 cust_pincode='$cust_pincode', 
	 cust_city='$cust_city',
	 cust_state='$cust_state', 
	 cust_country='$cust_country',
	 cust_nearby='$cust_nearby', 
	 cust_delivery_contact='$cust_delivery_contact', 
	 cust_delivery_contact_no='$cust_delivery_contact_no' 
	 where address_id='$address_id'";

	 $query = mysqli_query($con, $sql);

	 if ($query == true) {
	 	header("location: cust_address_details.php?cust_add_msg=1");
	 } else {
	 	header("location: cust_address_details.php?cust_add_err=2");
	 }

}

?>