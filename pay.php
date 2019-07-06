<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<?php
	session_start();
require 'admin/config.php';
require 'admin/fun.php';
$customer_id = $_POST['customer_id'];
$cust_email_id = $_POST['cust_email_id'];
$cust_mobile = $_POST['cust_mobile'];
$ip_address = $_POST['ip_address'];
$address_id = $_POST['address_id'];
if (isset($_POST['pay_now'])) {

  $customer_id = $_POST['customer_id'];
	$sql = "SELECT * FROM cart, products where customer_id='$customer_id' and cart.product_id=products.product_id";
	$action = mysqli_query($con, $sql);
	while ($fetch = mysqli_fetch_assoc($action)) {
		$product_id = $fetch['product_id'];
		$quantity = $fetch['quantity'];
		$product_price = $fetch['product_price'];
		$date_time = date('d/m/y h:m');
		$total_price = $product_price*$quantity;
		$insert = "INSERT into orders (customer_id, address_id, product_id, quantity, total_price, payment_mode, status, order_time) 
		VALUES ('$customer_id', '$address_id', '$product_id', '$quantity','$total_price', 'Online', 'Completed', '$date_time')";
		$query = mysqli_query($con, $insert);
   	}
	}
?>
<center style='padding: 10%;'>
 <form method="POST" action="https://api.razorpay.com/v1/checkout/hosted">
  <input type="hidden" name="checkout[key]" value="rzp_live_4fI2GyoDa5Hj3W">
  <input type="hidden" name="checkout[amount]" value="<?php echo price();?>00">
  <input type="hidden" name="checkout[prefill][contact]" value="<?php echo $cust_mobile;?>">
  <input type="hidden" name="checkout[prefill][email]" value="<?php echo $cust_email_id;?>"><!-- etc etc.. -->
  <input type="hidden" name="url[callback]" value="http://mahadevelectronics.com/done.php">
  <input type="hidden" name="url[cancel]" value="http://mahadevelectronics.com/err.php">
  <button type="submit" class="btn btn-lg btn-danger">Continue to Pay Rs.<?php price();?></button>
</form>
</center>



