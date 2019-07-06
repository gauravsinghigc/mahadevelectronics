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

	<title>Customer Address - Jaconetapparels</title>

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
	<?php include('navbar.php'); ?>

	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb pull-left">
				<li><a href="index.php">Home</a></li>
				<li><a href="customer_account.php"><?php customer_name(); ?></a></li>
				<li class="active" >Address Details</li>
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
					</div>
				</div>
				<div class='col-md-10 box-shadow'>
                       <div class='section-title'>
                          <h3>Address Details:
                          <a href="add_address.php?add_address=1"><button class="btn btn-danger btn-sm" style='float: right;'>Add New <b style="font-size: 15px;">+</b></button></a>
                       </h3>

                       </div>
                       <div class='row p-5'>
                          <div class="col-md-12">
                                <?php
                                 ini_set("display_errors", 0);
                      $add_add_msg = $_GET['add_add_msg'];
                      IF($add_add_msg){
                      	echo "<code class='bg-success'>Successfully Inserted Address!</code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_address_details.php' />";
                      }
                      $add_add_err = $_GET['add_add_err'];
                      IF($add_add_err){
                      	echo "<code class='bg-danger'>Address Insertion <b>FAILED!</B></code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_address_details.php' />";
                      }
                      ini_set("display_errors", 0);
                      $add_delete_msg = $_GET['add_delete_msg'];
                      IF($add_delete_msg){
                      	echo "<code class='bg-success'>Successfully Deleted Address!</code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_address_details.php' />";
                      }
                      $add_delete_err = $_GET['add_delete_err'];
                      IF($add_delete_err){
                      	echo "<code class='bg-danger'>Address Deletion <b>FAILED!</B></code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_address_details.php' />";
                      }
                      ini_set("display_errors", 0);
                      $cust_add_msg = $_GET['cust_add_msg'];
                      IF($cust_add_msg){
                      	echo "<code class='bg-success'>Successfully Updated Address!</code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_address_details.php' />";
                      }
                      $cust_add_err = $_GET['cust_add_err'];
                      IF($cust_add_err){
                      	echo "<code class='bg-danger'>Address Updation <b>FAILED!</B></code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_address_details.php' />";
                      }
                                   customer_all_address();
                                ?>
                           </div>
                         </div>        
                      </div> 
                    </div>
				</div>
			</div>
		</div>
	</section>

<?php include('footer.php'); ?>