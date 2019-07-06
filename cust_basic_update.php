<?php 

session_start();
include('admin/config.php');

if(isset($_POST['submit'])){

	$customer_id     = $_SESSION['id'];
	$cust_first_name = $_POST['cust_first_name'];
	$cust_last_name  = $_POST['cust_last_name'];
	$cust_nickname   = $_POST['cust_nickname'];

	if(empty($_POST['cust_nickname'])) {
		header("location: cust_basic_details.php?cust_data_err=1");
	} else {

		$sql = "UPDATE customer SET cust_first_name='$cust_first_name', cust_last_name='$cust_last_name', cust_nickname='$cust_nickname' where customer_id='$customer_id'";
		$query = mysqli_query($con, $sql);
		
		if($query == true){
			header("location: cust_basic_details.php?cust_update_msg=1");
		} else {
			header("location: cust_basic_details.php?cust_update_err=2");
		}
	}
}

?>