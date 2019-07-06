<?php 

session_start();

require('admin/config.php');
require('admin/fun.php');

if (isset($_GET['new_address_default'])) {

	$customer_id = $_SESSION['id'];
	$cust_address = $_POST['cust_address'];
	$cust_pincode = $_POST['cust_pincode'];
	$cust_city = $_POST['cust_city'];
	$cust_state = $_POST['cust_state'];
	$cust_country = $_POST['cust_country'];
	$cust_nearby = $_POST['cust_nearby'];
	$cust_delivery_contact = $_POST['cust_delivery_contact'];
	$cust_delivery_contact_no = $_POST['cust_delivery_contact_no'];

	$sql = "INSERT INTO cust_addresses 
	        (customer_id, cust_address, cust_pincode, cust_city, cust_state, cust_country, cust_nearby, cust_delivery_contact, cust_delivery_contact_no)
	             VALUES 
	    ('$customer_id', '$cust_address', '$cust_pincode', '$cust_city', '$cust_state', '$cust_country', '$cust_nearby', '$cust_delivery_contact', '$cust_delivery_contact_no')";
	$query = mysqli_query($con, $sql);

	if ($query == true) {
		header("location: cust_address_details.php?add_add_msg=1");
	} else {
		header("location: cust_address_details.php?add_add_err=1");
	}
}
if (isset($_GET['new_address_checkout'])) {

	$customer_id = $_SESSION['id'];
	$cust_address = $_POST['cust_address'];
	$cust_pincode = $_POST['cust_pincode'];
	$cust_city = $_POST['cust_city'];
	$cust_state = $_POST['cust_state'];
	$cust_country = $_POST['cust_country'];
	$cust_nearby = $_POST['cust_nearby'];
	$cust_delivery_contact = $_POST['cust_delivery_contact'];
	$cust_delivery_contact_no = $_POST['cust_delivery_contact_no'];

	$sql = "INSERT INTO cust_addresses 
	        (customer_id, cust_address, cust_pincode, cust_city, cust_state, cust_country, cust_nearby, cust_delivery_contact, cust_delivery_contact_no)
	             VALUES 
	    ('$customer_id', '$cust_address', '$cust_pincode', '$cust_city', '$cust_state', '$cust_country', '$cust_nearby', '$cust_delivery_contact', '$cust_delivery_contact_no')";
	$query = mysqli_query($con, $sql);

	if ($query == true) {
		header("location: shopping.php?success=Successfully_Inserted");
	} else {
		header("location: shopping.php?error=Not_Inserted");
	}
} elseif (isset($_POST['add_to_cart'])) {

	$product_id = $_POST['product_id'];
	$customer_id = $_POST['customer_id'];
	$ip_address = ip();
	$date_time = $_POST['date_time'];
	$product_price = $_POST['product_price'];

	$sql_check = "SELECT * FROM cart where ip_address='$ip_address' and product_id='$product_id' and customer_id='$customer_id'";
	$query = mysqli_query($con, $sql_check);
	$row = mysqli_fetch_assoc($query);

	$cart_id = $row['cart_id'];

	$sql = "SELECT * FROM cart where product_id='$product_id' and ip_address='$ip_address' and customer_id='$customer_id' and cart_id='$cart_id'";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($query);

	if ($row == true) {

		$sql = "UPDATE cart SET 
		date_time='$date_time', 
		quantity='1',
		total_price ='0' 
		where customer_id='$customer_id' and product_id='$product_id' and ip_address='$ip_address' and cart_id='$cart_id'";
		$query = mysqli_query($con, $sql);

		if ($query == true) {
			header("location: product_details.php?product_id=$product_id&msg=success_updated");
		} else {
			header("location: product_details.php?product_id=$product_id&msg=err_not_updated");
		}
	} elseif ($row != true) {

		$sql = "INSERT into cart (ip_address, customer_id, product_id, date_time, quantity, total_price)
			 VALUES 
   ('$ip_address', '$customer_id', '$product_id', '$date_time', '1', '$product_price')";
		$query = mysqli_query($con, $sql);
		if ($query == true) {
			header("location: product_details.php?product_id=$product_id&msg=inserted");
		} else {
			header("location: product_details.php?product_id=$product_id&msg=not_inserted");
		}
	}
} elseif (isset($_POST['add_to_cart_buy_now'])) {

	$product_id = $_POST['product_id'];
	$customer_id = $_POST['customer_id'];
	$ip_address = ip();
	$date_time = $_POST['date_time'];
	$product_price = $_POST['product_price'];

	$sql_check = "SELECT * FROM cart where ip_address='$ip_address' and product_id='$product_id' and customer_id='$customer_id'";
	$query = mysqli_query($con, $sql_check);
	$row = mysqli_fetch_assoc($query);

	$cart_id = $row['cart_id'];

	$sql = "SELECT * FROM cart where product_id='$product_id' and ip_address='$ip_address' and customer_id='$customer_id' and cart_id='$cart_id'";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($query);

	if ($row == true) {

		$sql = "UPDATE cart SET 
		date_time='$date_time', 
		quantity='1',
		total_price ='0' 
		where customer_id='$customer_id' and product_id='$product_id' and ip_address='$ip_address' and cart_id='$cart_id'";
		$query = mysqli_query($con, $sql);

		if ($query == true) {
			header("location: shopping.php");
		} else {
			header("location: product_details.php?product_id=$product_id&msg=err_not_updated");
		}
	} elseif ($row != true) {

		$sql = "INSERT into cart (ip_address, customer_id, product_id, date_time, quantity, total_price)
			 VALUES 
   ('$ip_address', '$customer_id', '$product_id', '$date_time', '1', '$product_price')";
		$query = mysqli_query($con, $sql);
		if ($query == true) {
			header("location: shopping.php?product_id=$product_id&msg=inserted");
		} else {
			header("location: product_details.php?product_id=$product_id&msg=not_inserted");
		}
	}
}
?>