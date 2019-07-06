<?php 

session_start();
if(empty($_SESSION['id'])){
	header("location: customer_login.php?login_msg=1");
	exit();
}

require('admin/config.php');
require('admin/fun.php');
require 'texts.php'; ?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Customer Account - Jaconetapparels</title>

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
<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
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
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" href="about-us">About Us</a></li>
						<li class="dropdown mega-dropdown"><a class="dropdown-toggle" href="index.php">Contact Us</a></li>
						<li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="index.html">Home</a></li>
								<li><a href="products.html">Products</a></li>
								<li><a href="product-page.html">Product Details</a></li>
								<li><a href="checkout.html">Checkout</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb pull-left">
				<li><a href="index.php">Home</a></li>
				<li><a href="customer_account.php"><?php customer_name(); ?></a></li>
				<li class="active" >Basic Details</li>
			</ul>
			<ul class="breadcrumb pull-right">
				<li><a href="customer_logout.php">Logout <b style="color: red;">->|</b></a></li>
			</ul>
			
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<section class="container margin_top margin_bottom">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-2">
					<div class="customer_img">

						<?php customer_img();  ?>

                              <hr> 

                         <form action='update_cust_img.php' method='post' enctype='multipart/form-data'>
                          <div class='form-group'>
                             <input type='FILE' class='input' name='customer_img' style='padding-top:7%; padding-left:8%;' required><br>
                             <button class='btn btn-success' type='submit' name='submit'>Update Image</button>
                          </div>
                          </form>

					</div>
				</div>
				<div class='col-md-10 box-shadow'>
                       <div class='section-title'>
                          <h3>Basic Details</h3>
                       </div>
                       <div class='row p-5'>
                          <div class="col-md-12">
      
                      <?php
                      ini_set("display_errors", 0);
                      $cust_data_err = $_GET['cust_data_err'];
                      if($cust_data_err){
                      	echo"<code class='bg-danger'><b>ERROR!</b> Check Form Filled Data</code>";
                      }
                      $cust_update_msg = $_GET['cust_update_msg'];
                      if($cust_update_msg){
                      	echo"<code class='bg-success'><b>Successfully</b> Updated Data</code><br><br>
                      	<meta http-equiv='refresh' content='2; cust_basic_details.php' />";
                      }
                      $cust_update_err = $_GET['cust_update_err'];
                      if($cust_update_err){
                           echo"<code class='bg-danger'><b>ERROR!</b>Cannot Submit Blank Form</code><br><br>
                           <meta http-equiv='refresh' content='5; cust_basic_details.php' />";

                      }
                     customer_basic_details();
                        ?>
                                <div class="col-md-6">
                                  <a href="customer_account.php">
                                   <div class="form-group">
                                      <a href="customer_account.php" class="font-white btn btn-sm btn-info" style="color:white !important;"><b>Back to Account Page</b></a>
                                    </div>
                                </a>
                                </div>
                           </div>
                         </div>        
                      </div> 
                    </div>
				</div>
			</div>
		</div>
	</section>

<?php include('footer.php'); ?>