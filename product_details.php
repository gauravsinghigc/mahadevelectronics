<?php 
require('admin/config.php');
require('admin/fun.php');
require 'texts.php';

session_start();
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Product Details - <?php echo $title;?></title>

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
<script src="js/custom.js"></script>
	<?php 

$favicon = "<link rel='icon' href='<?php echo $logo_src;?>' type='image/x-icon'>";

echo $favicon; ?>

</head>

<body>

<?php include('header.php'); ?>
   <?php require 'navbar.php'; ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a></li>

	<?php 

if (isset($_GET['product_id'])) {

	$product_id = $_GET['product_id'];
	$sql = "SELECT * FROM products, brand where product_id='$product_id' and products.brand_id=brand.brand_id";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($query);
	?>
				<li class="active"><?php echo $row['product_title']; ?></li>
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
				<!--  Product Details -->
				<div class="product product-details clearfix">
					<div class="col-md-5">
						<div style="box-shadow: 0px 0px 1px grey;">
							<div class="product-view">
								<img src="admin/img/product_img/<?php echo $row['pro_img1']; ?>" alt="<?php echo $row['product_title']; ?>" title="<?php echo $row['product_title']; ?>" >
							</div>
						</div>
					</div>
					<div class="col-md-7">
						<div class="product-body">
							<h2 class="product-name">
								<div class='section-title'><?php echo $row['product_title']; ?></div>
							</h2>
						<h3 class="product-price" style="float: right;box-shadow: 0px 0px 1px red; padding: 2%; border-radius: 9%;font-family: b;">
						
						<?php 
					$neck_customization = "Neck customizations";
					$sleeve_customization = "Sleeve Customizations";
					$length_customization = "Length Customizations";

					$product_id = $_GET['product_id'];
					$customer_id = $_SESSION['id'] or 0;
					$ip_address = ip();

					$sql = "SELECT * FROM products where product_id='$product_id'";
					$query = mysqli_query($con, $sql);
					$row = mysqli_fetch_assoc($query);
					$product_price = $row['product_price'];

					if ($neck_price == 0 and $sleeve_price == 0 and $length_price == 0) {
						echo "<b>Rs.</b>$product_price";
					} else {
						$final_price = $neck_price + $sleeve_price + $length_price + $product_price;
						echo "<b>Rs.</b>$final_price";
					}

					?>
						
						</h3>
							<div>
							</div><br><br>
								<h4>
								<div class='section-title'>Product Details:</div>
							</h4>
							<table align="center" style="width:100%; ">
								<tr class="bg-info">
									<td><b style=" text-decoration : red underline !important;
						">Details:</b></td>
									<td>:</td>
									<td><b style=" text-decoration : red underline !important;
						">Descriptions:</b></td>
								</tr>
							    <tr>
							    	<td><strong>Availability</strong></td>
							    	 <td>:</td>
							         <td>In Stock</td>
							     </tr>
							     <tr>
							     	<td><strong>Brand</strong></td>
							     	<td>:</td>
							        <td>Mahadev Electronics</td>
							    </tr>
							        <td><strong>Description</strong></td>
							        <td>:</td>
							        <td><?php 
																		$product_id = $_GET['product_id'];
																		$sql = "SELECT * FROM products, brand where product_id = '$product_id' and products.brand_id = brand.brand_id";
																		$query = mysqli_query($con, $sql);
																		$row = mysqli_fetch_assoc($query);
																		echo $row['product_desc']; ?></td>
							     </tr>
							<?php

						if (!isset($_POST['more_details'])) {
							$sql = "SELECT * From attribute, product_attribute where attribute.attribute_id=product_attribute.attribute_id and product_attribute.product_id='$product_id' limit 0,3";
							$query = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_array($query)) {
								$att_name = $row['attribute_name'];
								$value = $row['value'];

								echo "<tr>
							<td> <strong>$att_name</strong></td>
							<td>:</td>
							<td>$value</td>
							</td>";
							}
							echo "
							<tr><td></td></td>
							<td>
							<form action='product_details.php?product_id=$product_id' method='post' class='pull-right'>
							<input type='text' name='more_details' value='$product_id' hidden >
							<a class='active'> <button type='submit' name='submit' style='background-color:white !important; border:none;'>>>more details...</button></a>
							</form>
							</td>
							</tr> ";

						} elseif (isset($_POST['more_details'])) {
							$sql = " SELECT * From attribute, product_attribute where attribute.attribute_id=product_attribute.attribute_id and product_attribute.product_id='$product_id' ";
							$query = mysqli_query($con, $sql);
							while ($row = mysqli_fetch_array($query)) {
								$att_name = $row['attribute_name'];
								$value = $row['value'];

								echo "<tr>
							<td> <strong>$att_name </strong> </td>
							<td> : </td>
							<td>$value</td>
							</td> ";
							}
							echo "
							<tr> <td> </td> </td>
							<td>
							<form action='product_details.php?product_id=$product_id' method='post' class='pull-right'>
							<input type='text' name='hide_details' value='$product_id' hidden>
							<a class='active'> <button type='submit' name='submit' style='background-color:white !important; border:none;' class='pull-right'>>> hide details ...</button> </a>
							</form>
							</td> </tr> ";

						}
						?>
						</table>
							
                           <div class="step3">
                        <!--Measure step 3 starts here-->
                        <style type="text/css">
                             .img_style_option {
                            	width: 100% !important;
                            }
                        	.img_style_option:hover {
                              box-shadow: 0px 0px 5px red !important;
                              transform: scale(2.2);
                        	}
                        	button em {
                        		font-size: 8px !important;
                        	}
																									.teble_td td {
																										width: 7.14285714286% !important;
																									}
                        </style>
                        <?php 
                       $cust_value_1 = "1234";
																							$cust_value_2 = "5678";
																							$cust_value_3 = "9012";

																							function customer_id_value()
																							{
																								if (empty($_SESSION['id'])) {
																									$value = "0";
																									echo $value;
																								} elseif (!empty($_SESSION['id'])) {
																									echo $_SESSION['id'];
																								}
																							}
																							?>
                    </div>

							<div class="product-btns">
							<form action="insert.php" method="post" style="float: right;">
								<input type='text' name='add_to_cart' value='add_to_cart' hidden>
							<?php 
						$product_id = $_GET['product_id']; //TAKE THIS
						$customer_id = $_SESSION['id'] or 0; //TAKE THIS
						$ip_address = ip(); //TAKE THIS

						$sql = "SELECT * FROM products where product_id='$product_id'";
						$query = mysqli_query($con, $sql);
						$row = mysqli_fetch_assoc($query);
						$product_price = $row['product_price'];//TAKE THIS

						$addition_price = $neck_price + $sleeve_price + $length_price;//take this
						$add_cart_time = date('Y-m-d H:i a');//take this
						?>
						
						<input type='text' name='product_id' value='<?php echo $_GET['product_id']; ?>' hidden>
						<input type='text' name='customer_id' value='<?php echo $_SESSION['id']; ?>' hidden>
						<input type='text' name='ip_address' value='<?php echo ip(); ?>' hidden>
						<input type='text' name='date_time' value='<?php echo $add_cart_time; ?>' hidden>
						<input type='text' name='product_price' value='<?php echo $product_price; ?>' hidden>


								     <button type="submit" class="btn-info add-to-cart btn" style="float: right;">Add to Cart</button>
							</form>
								<form action='insert.php' method='post'>
												<input type='text' name='add_to_cart_buy_now' value='add_to_cart_buy_now' hidden>
											<input type='text' name='product_id' value="<?php echo $row['product_id'];?>" hidden>
						      <input type='text' name='customer_id' value='<?php echo $_SESSION['id'];?>' hidden>
						     <input type='text' name='ip_address' value='<?php echo ip();?>' hidden>
								<button class="btn-danger add-to-cart btn" style="float: left;" name="add_to_cart_buy_now" type="submit">Buy Now</button>	
								</form>							
							</div>
						</div>
					</div>

				<?php 
		} else {
			header("location: products.php");
		} ?>
					</div>
		        </div>
              </div><br>

	<?php require 'footer.php';?>

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>
	
</body>

</html>
