<?php 

session_start();

require('admin/config.php');
require('admin/fun.php');
require 'texts.php' ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Checkout - <?php echo $title;?></title>

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

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	<?php 

$favicon = "<link rel='icon' href='<?php echo $logo_src;?>' type='image/x-icon'>";

echo $favicon;

ini_set("display_errors", 0); ?>

</head>

<body>
	<?php include('header.php'); ?>

	<?php include('navbar_1.php'); ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active">Products</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th><?php $msg = $_GET['msg'];
													if ($msg) {
														echo "<code class='bg-danger'>Quantity Changed!</code>
										                         <meta http-equiv='refresh' content='3; shopping.php' />";
													} ?>
											<?php $erro_zero = $_GET['erro_zero'];
										if ($erro_zero) {
											echo "<code class='bg-danger'>Quantity cannot be Zero!</code>";
										} ?>
										</th>
										<th class="text-center">Price/Piece</th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								<tbody>
									<?php 
								$ip_address = ip();
								$customer_id = $_SESSION['id'];
								$sql = "SELECT * from cart, products WHERE cart.product_id=products.product_id and cart.ip_address='$ip_address' and cart.customer_id='$customer_id'";
								$query = mysqli_query($con, $sql);

								while ($row = mysqli_fetch_array($query)) {
									$cart_id = $row['cart_id'];
									$product_title = $row['product_title'];
									$neck_price = $row['neck_price'];
									$sleeve_price = $row['sleeve_price'];
									$length_price = $row['length_price'];
									$product_price = $row['product_price'];
									$quantity = $row['quantity'];
									$img_file = $row['pro_img1'];
									$product_id_cart = $row['product_id'];


									echo "
      <tr>
	 					<td class='thumb'><img src='admin/img/product_img/$img_file' alt='$product_title' title='$product_title'></td>
						<td class='details' style='font-size:14px;'>
						    <a href='product_details.php?product_id=$product_id' style='font-size:15px;'>$product_title</a>
								<ul>
								</ul>
						</td>
						<td class='price text-center'><b>Rs.</b>";
									$product_final_price = $product_price;
									echo $product_final_price;
									echo "<b class='pull-right'> x</b> <br><!--<del class='font-weak'><small>$40.00</small></del>--></td>
						<td class='qty text-center'>
																												<form action='update.php' method='post'>
																												 <input class='input' type='number' name='update_quantity' value='update_quantity' hidden>
																												<input class='input' type='number' name='quantity' value='$quantity'>
																													<input class='input' type='text' name='ip_address' value='$ip_address' hidden>
																														<input class='input' type='text' name='customer_id' value='$customer_id' hidden>
																														 <input class='input' type='text' name='product_id' value='$product_id_cart' hidden>
						                      <input type='submit' name='submit' name='submit' value='+' class='btn btn-info btn-sm'>
                            </form>
						</td>
						<td class='total text-center'><strong class='primary-color'><b style='color:black;'>Rs.</b>" . $product_final_price * $quantity . "</strong></td>
						<td class='text-right'>
							<form action='delete.php' method='post' >
							<input type='text' name='remove_item' value='$cart_id' hidden>
										<button class='main-btn icon-btn' type='submit' name='submit'><i class='fa fa-trash'></i></button>
										</form>
						</td>
					</tr>
									";
								}
								?>

								</tbody>
								<tfoot>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total"><b>Rs.</b><?php price(); ?></th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>Shipping Charges:</th>
										<td colspan="2">Free Shipping</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>Total Amount:</th>
										<th colspan="2" class="total"><b>Rs.</b><?php price(); ?></th>
									</tr>
								</tfoot>
							</table>
						</div>


					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>
							<?php 
						if (empty($_SESSION['id'])) {
							echo "<p> Please <a href='customer_login.php' style='text-decoration: underline red !important;' >Login</a> to continuing Shopping....</p>";
						} elseif (!empty($_SESSION['id'])) {
							$customer_id = $_SESSION['id'];
                $sql = "SELECT * FROM customer where customer_id = '$customer_id'";
                $query = mysqli_query($con, $sql);
                $fetch = mysqli_fetch_assoc($query);
                $cust_first_name = $fetch['cust_first_name'];
                $cust_last_name = $fetch['cust_last_name'];
                $cust_mobile = $fetch['cust_mobile'];
                $cust_email_id = $fetch['cust_email_id'];?>
                 <h4><?php echo $cust_first_name." ".$cust_last_name;?></h4>
                 <h5><?php echo $cust_mobile;?></h5>
                 <h5><?php echo $cust_email_id;?></h5>
                 <h6><code>*</code>Select address for Billing....</h6>
                <?php
						}
						?><br>
						<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>
							<?php 
						if (empty($_SESSION['id'])) {
							echo "<p> Please <a href='customer_login.php' style='text-decoration: underline red !important;' >Login</a> to continuing Shopping....</p>";
						} elseif (!empty($_SESSION['id'])) {
							$customer_id = $_SESSION['id'];
                $sql = "SELECT * FROM customer where customer_id = '$customer_id'";
                $query = mysqli_query($con, $sql);
                $fetch = mysqli_fetch_assoc($query);
                $cust_first_name = $fetch['cust_first_name'];
                $cust_last_name = $fetch['cust_last_name'];
                $cust_mobile = $fetch['cust_mobile'];
                $cust_email_id = $fetch['cust_email_id'];?>
                 <h4><?php echo $cust_first_name." ".$cust_last_name;?></h4>
                 <h5><?php echo $cust_mobile;?></h5>
                 <h5><?php echo $cust_email_id;?></h5>
                 <h6><code>*</code>Select address for shipping....</h6>
                <?php
						}
						?>
						</div>
					</div>



					<div class="col-md-6">
						<div class="shiping-methods"> 
							<?php 
						if (empty($_SESSION['id'])) {
							echo "";
						} else {
							echo "
                            <div class='section-title'> 
								<h4 class='title'>Select Address:</h4>
							</div>
							";
						}
						?><form action="pay.php" method="post">
							<?php select_address_at_checkout_page();

						if (empty($_SESSION['id'])) {
							echo "";
						} else {
							echo " 
							<div class='input-checkbox'>
								<input type='radio' name='shipping' id='shipping-2'>
								<label for='shipping-2'>Add New Address</label>
								<div class='caption'>
									<a href='add_address.php?add_at_checkout=1' class='pull-left btn btn-success btn-sm'>
		  	                          Add New +
		  	                        </a>
								</div>
							</div>
						</div>";
						}
						if (empty($_SESSION['id'])) {
							echo "";
						} else {
							?>
						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Payments Methods:</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Net Banking/Debit Card/Credit Card/Online</label>
								<div class="caption">
									<p>Press The Following Button Continue Shopping and Making a Payment of <b>Rs.<?php price(); ?></b>.<br>
								    <b style="color: red; font-size: 12px;">*</b><b style="font-size: 10px; color: black;">
								    You will be redirected to our Online Payment Gateway</b></p>

								    <?php 
								   $customer_id = $_SESSION['id'];
		$sql = "SELECT * FROM customer where customer_id='$customer_id'";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($query);

		$customer_id = $row['customer_id'];
		$cust_first_name = $row['cust_first_name'];
		$cust_last_name = $row['cust_last_name'];
		$full_name = $cust_first_name."".$cust_last_name;
		$cust_email_id =  $row['cust_email_id'];
		$cust_mobile = $row['cust_mobile'];
	?>
		<input type="text" name="cust_mobile" value="<?php echo $cust_mobile;?>" hidden>
		<input type="text" name="cust_email_id" value="<?php echo $cust_email_id;?>" hidden>
		<input type="test" name="customer_id" value="<?php echo $customer_id;?>" hidden=''>
		<input type="text" name="ip_address" value="<?php echo ip();?>" hidden=''>
  <button class="btn btn-danger btn-sm" type="submit" name="pay_now">Continue</button>
</form>
											</form>

								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2">
								<label for="payments-2">Cash On Delivery</label>
								<div class="caption">
									<p>You Have to pay <b>Rs.<?php price(); ?></b> + <b>Rs.150</b>  at the time of Delivery. <br>
								</p>
									<input type="text" name="customer_id" value="" hidden="">
									<input type="text" name="cart_id" value="" hidden="">
									<input type="text" name="ip_address" value="" hidden="">
									<input type="text" name="address_id" value="" hidden="">
									<input type="text" name="" value="" hidden="">
									<input type="text" name="" value="" hidden="">
									<input type="text" name="" value="" hidden="">
									<input type="text" name="" value="" hidden="">
									<input type="text" name="" value="" hidden="">
									<input type="text" name="" value="" hidden="">
									<input type="text" name="" value="" hidden="">
								   <button class="btn-danger btn btn-sm "> Continue </button>
								</div>
							</div>
						</div>

					<?php 
			} ?>
					</div>
			</form>
					

					</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<?php require 'footer.php'; ?>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>
