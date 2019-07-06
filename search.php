<?php 
require 'admin/config.php';

if (isset($_POST['submit'])) {
	$search_query = $_POST['search_query'];
	$sql = "SELECT * FROM products, brand, category where product_title like '%".$search_query."%' OR brand_title like '%".$search_query."%' OR cat_title like '%".$search_query."%'" ;
	$query = mysqli_query($con, $sql);
	$fetch = mysqli_fetch_assoc($query);
	if ($fetch == true) {
		$cat_id = $fetch['cat_id'];
		header("location: products.php?cat_id=$cat_id");
	} else {
		header("location: products.php?cat_id_null=1");
	}
}
