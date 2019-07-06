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

	<title><?php echo $home_page_title; ?></title>

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

	$favicon = "<link rel='icon' href='$logo_src' type='image/x-icon'>";

	echo $favicon; ?>

</head>

<body>

<?php include('header.php'); ?>

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav">
					<span class="category-header">Categories <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<?php  navbar_for_website(); ?>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" href="index.php">Home</a></li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" href="products.php">Products</a></li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" href="index.php">Contact Us</a></li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<!-- HOME -->
	<div id="home">
		<!-- container -->
		<div class="container">
			<!-- home wrap -->
			<div class="home-wrap">
				<!-- home slick -->
				<div id="home-slick">
					<?php 
					images_slider();
					?>
				</div>
				<!-- /home slick -->
			</div>
			<!-- /home wrap -->
		</div>
		<!-- /container -->
	</div>
	<!-- /HOME -->
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Best Selling Products</h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->
                       <style type="text/css">
                    	.pro_box_shadow{
                    		box-shadow: 0px 0px 1px grey !important; border-radius: 5px;
                    	}
                    	.pro_box_shadow:hover {
                    		box-shadow: 0px 0px 5px red !important; border-radius: 5px;
                    	}
                    	.product_img_style {
                    		width:100% !important;
                    		height:45%;
                    	}
                    </style>
				<!-- Product Slick -->
				<div class="col-md-12" style="width: 100% !important;">
					<div class="row">
						<div id="product-slick-2" class="product-slick">
							<!-- Product Single -->

							<?php

							$sql = "SELECT * FROM products, brand where brand.brand_id=products.brand_id limit 0,15";
							$query = mysqli_query($con, $sql);

							while($row = mysqli_fetch_array($query)){
                               ?>
							<div class="product product-single" style="height: auto !important;">
								<div class="product-thumb">
									<a href="product_details.php?product_id=<?php echo $row['product_id']; ?>">
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i>Details</button>
								</a>
									<img src="admin/img/product_img/<?php echo $row['pro_img1'];?>" alt="<?php $row['product_title'];?>" title="<?php $row['product_title'];?>" style="height: 300px; width: 250px;">
								</div>
								<div class="product-body">
									<h3 class="product-price"><b>Rs.</b><?php echo $row['product_price']; ?></h3>
									<div class="product-rating">
										<?php echo $row['brand_title']; ?>
									</div>
									<h2 class="product-name"><a href="#"><?php echo $row['product_title']; ?></a></h2>
									<div class='product-btns'>
										<form action='insert.php' method='post'>
												<input type='text' name='add_to_cart_buy_now' value='add_to_cart_buy_now' hidden>
											<input type='text' name='product_id' value="<?php echo $row['product_id'];?>" hidden>
						      <input type='text' name='customer_id' value='<?php echo $_SESSION['id'];?>' hidden>
						     <input type='text' name='ip_address' value='<?php echo ip();?>' hidden>
											<button class='btn btn-info add-to-cart pull-left' type="submit" name="add_to_cart_buy_now">Buy Now</button>
										</form>
											<form action='insert.php' method='post'>
												<input type='text' name='add_to_cart' value='add_to_cart' hidden>
											<input type='text' name='product_id' value="<?php echo $row['product_id'];?>" hidden>
						      <input type='text' name='customer_id' value='<?php echo $_SESSION['id'];?>' hidden>
						     <input type='text' name='ip_address' value='<?php echo ip();?>' hidden>
											<button class='btn btn-danger add-to-cart pull-right'><i class='fa fa-shopping-cart'></i> Add to Cart</button>
										</form>
											<div class='clearfix'></div>
										</div>
								</div>
							</div>
							<!-- /Product Single -->
						<?php } ?>

						</div>
					</div>
				</div>
				<!-- /Product Slick -->
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
