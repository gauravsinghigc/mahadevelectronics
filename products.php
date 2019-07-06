<?php 

session_start();

require('admin/config.php');
require('admin/fun.php');
require 'texts.php'; ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Products - Jaconetapparels</title>

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

	$favicon = "<link rel='icon' href='./img/logo.png' type='image/x-icon'>";

	echo $favicon; ?>

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
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">
					<!-- aside widget -->
					<div class="aside">
						<!--<h3 class="aside-title">Shop by:</h3>
						<ul class="filter-list">
							<!--
							<li><span class="text-uppercase">color:</span></li>
							<li><a href="#" style="color:#FFF; background-color:#8A2454;">Camelot</a></li>
							<li><a href="#" style="color:#FFF; background-color:#475984;">East Bay</a></li>
							<li><a href="#" style="color:#FFF; background-color:#BF6989;">Tapestry</a></li>
							<li><a href="#" style="color:#FFF; background-color:#9A54D8;">Medium Purple</a></li>
						
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Price:</span></li>
							<li><a href="#">MIN: $20.00</a></li>
							<li><a href="#">MAX: $120.00</a></li>
						</ul>

						<ul class="filter-list">
							<li><span class="text-uppercase">Gender:</span></li>
							<li><a href="#">Men</a></li>
						</ul>

						<button class="primary-btn">Clear All</button>-->
					</div>

					<!-- aside widget
					<div class="aside">
						<h3 class="aside-title">Filter By Color:</h3>
						<ul class="color-option">
							<li><a href="#" style="background-color:#475984;"></a></li>
							<li><a href="#" style="background-color:#8A2454;"></a></li>
							<li class="active"><a href="#" style="background-color:#BF6989;"></a></li>
							<li><a href="#" style="background-color:#9A54D8;"></a></li>
							<li><a href="#" style="background-color:#675F52;"></a></li>
							<li><a href="#" style="background-color:#050505;"></a></li>
							<li><a href="#" style="background-color:#D5B47B;"></a></li>
						</ul>
					</div>
					/aside widget -->

					<!-- aside widget
					<div class="aside">
						<h3 class="aside-title">Filter By Size:</h3>
						<ul class="size-option">
							<li class="active"><a href="#">S</a></li>
							<li class="active"><a href="#">XL</a></li>
							<li><a href="#">SL</a></li>
						</ul>
					</div>
					 /aside widget -->

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Brand:</h3>
						<ul class="list-links">
							<?php 
							$sql = "SELECT * FROM brand";
					$query = mysqli_query($con, $sql);
					while ( $row = mysqli_fetch_assoc($query)){
					$brand_title = $row['brand_title'];
					$brand_id = $row['brand_id'];

					echo "<li><a href='products.php?brand_id=$brand_id'>$brand_title</a></li>";
				}

					?>
						</ul>
					</div>
					<div class="aside">
						<h3 class="aside-title">Filter by categories:</h3>
						<ul class="list-links">
							<?php 
							$sql = "SELECT * from category";
	$query = mysqli_query($con, $sql);

	while ($row = mysqli_fetch_assoc($query)) {

		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		echo "<li><a href='products.php?cat_id=$cat_id'>$cat_title</a></li>";
	}

					?>
						</ul>
					</div>
					<!-- /aside widget -->

					<!-- aside widget
					<div class="aside">
						<h3 class="aside-title">Filter by Gender</h3>
						<ul class="list-links">
							<li class="active"><a href="#">Men</a></li>
							<li><a href="#">Women</a></li>
						</ul>
					</div>
					/aside widget -->
				</div>
				<!-- /ASIDE -->

				<!-- MAIN -->
				<div id="main" class="col-md-9">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="sort-filter">
								<?php
								ini_set("display_errors", 0);
								$cart_add_success = $_GET['cart_add_success'];
								if($cart_add_success){
									echo"<code class='bg-success'>Product Inserted Into Cart Successfully!</code>
									<meta http-equiv='refresh' content='4; products.php' />";
								}
								$cart_add_err = $_GET['cart_add_err'];
								if($cart_add_err){
									echo"<code class='bg-danger'>Failed! Something Went Wrong.</code>
									<meta http-equiv='refresh' content='4; products.php' />";
								}
								$delete_msg = $_GET['delete_msg'];
								if($delete_msg){
									echo"<code class='bg-success'>Product Deleted From Cart Successfully!</code>
									<meta http-equiv='refresh' content='4; products.php' />";
								}
								$delete_error = $_GET['delete_error'];
								if($delete_error){
									echo"<code class='bg-danger'>Failed! Something Went Wrong.</code>
									<meta http-equiv='refresh' content='4; products.php' />";
								} $cart_error = $_GET['cart_error'];
								if($cart_error){
									echo"<code class='bg-danger'>Item Already Inserted!</code>
									";
								}

								?>
								
							</div>
						</div>
						<div class="pull-left">
							<ul class="store-pages">
								<li><span class="text-uppercase">Sort By:--</span></li>
								<li><a href='#'>Price Low to High--</a></li>
								<li><a href="#">Price High to Low--</a></li>
								<li><a href="#">Relevance--</a></li>
							</ul>
						</div>
						<div class="pull-right">
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div>
					<!-- /store top filter -->
                    <style type="text/css">
                    	.pro_box_shadow{
                    		box-shadow: 0px 0px 1px grey; border-radius: 5px;
                    	}
                    	.pro_box_shadow:hover {
                    		box-shadow: 0px 0px 5px red; border-radius: 5px;
                    	}
                    	.product_img_style {
                    		width:100% !important;
                    		height:40%;
                    	}
                    </style>
					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">

                         <?php
                          if (empty($_GET['cat_id'])) {
                          	all_products();   
                          } elseif(!empty($_GET['cat_id'])) {
                          	all_products_with_cat();
                          } elseif (isset($_GET['brand_id'])) {
                          	all_products_with_brand();
                          } elseif (isset($_GET['cat_id_null'])) {
                          	?>
                             <div class="col-md-12">
                             	<h4>Product Not Available!!</h4>
                             </div>
                          	<?php 
                          }
                          ?>

							
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

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
