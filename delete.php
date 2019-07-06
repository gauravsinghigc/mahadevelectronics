<?php
session_start();
require 'admin/config.php';

if (isset($_GET['delete_cart'])) {

	$cart_id = $_GET['delete_cart'];
	$sql = "DELETE FROM cart where cart_id='$cart_id'";
	$query = mysqli_query($con, $sql);

	if ($query == true) {
		header("location: index.php?delete_msg=1");
	} else {
		header("location: index.php?delete_error=2");
	}
}
if (isset($_GET['delete_cart_checkout'])) {

	$cart_id = $_GET['delete_cart_checkout'];
	$sql = "DELETE FROM cart where cart_id='$cart_id'";
	$query = mysqli_query($con, $sql);

	if ($query == true) {
		header("location: shopping.php?delete_msg=1");
	} else {
		header("location: shopping.php?delete_error=2");
	}
}
if (isset($_POST['remove_item'])) {

	$cart_id = $_POST['remove_item'];

	$sql = "DELETE from cart where cart_id='$cart_id'";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($query);

	if (empty($row['cart_id'])) {
		header("location: index.php?msg=cart_empty");
	} elseif (!empty($row['cart_id'])) {
		if ($query == true) {
			header("location: shopping.php?msg=deleted");
		} else {
			header("location: shopping.php?msg=not_deleted");
		}
	}
}



?>