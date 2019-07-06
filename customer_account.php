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

	<title>Customer Account - <?php echo $title;?></title>

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
    <link rel='icon' href='./img/logo.png' type='image/x-icon'>

</head>

<body>
	<?php include('header.php'); ?>
	<?php include('navbar_1.php'); ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb pull-left">
				<li><a href="index.php">Home</a></li>
				<li class="active"><?php customer_name(); ?></li>
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
<!--                          <form action='update_cust_img.php' method='post' enctype='multipart/form-data'>
                          <div class='form-group'>
                             <input type='FILE' class='input' name='customer_img' style='padding-top:7%; padding-left:8%;' required><br>
                             <button class='btn btn-success' type='submit' name='submit'>Update Image</button>
                          </div>
                          </form>

                      -->
					</div>
				</div>
				<div class='col-md-10 box-shadow'>
                       <div class='section-title'>
                          <h3>Account Details</h3>
                       </div>
                       <div class='row p-5'>
                          <div class="col-md-12">
                          	<a href="cust_basic_details.php" >
                        <div class='col-md-3 box-shadow-2 margin-2'>
                              <div class='section-title'>
                                 <h5>Personal Information Details</h5>
                              </div>
                           <p>Name, Nickname, Profile image changes and update...</p>
                        </div>
                            </a>

                            <a href="cust_login_data.php">
                       <div class='col-md-3 box-shadow-2 margin-2'>
                              <div class='section-title'>
                                 <h5>Login and Security</h5>
                              </div>
                           <p>Username, Email-id, Password and contact information...</p>
                        </div>
                             </a>

                         <a href="cust_address_details.php">
                       <div class='col-md-3 box-shadow-2 margin-2'>
                              <div class='section-title'>
                                 <h5>Address Details</h5>
                              </div>
                           <p>Update your Delivery Address and Contact Personal...</p>
                        </div>
                            </a>

                         <a href="#">
                       <div class='col-md-3 box-shadow-2 margin-2'>
                              <div class='section-title'>
                                 <h5>Payment Details</h5>
                              </div>
                           <p>Update your Payment Information...</p>
                        </div>
                            </a>
                         <a href="cust_orders.php">
                       <div class='col-md-3 box-shadow-2 margin-2'>
                              <div class='section-title'>
                                 <h5>Order Details</h5>
                              </div>
                           <p>Track an Order, Order history and much more...</p>
                        </div>
                            </a>
                       </div>
                       </div>
				</div>
			</div>
		</div>
	</section>

<?php include('footer.php'); ?>