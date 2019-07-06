<?php 

session_start();
if(empty($_SESSION['id'])){
	header("location: customer_login.php?login_msg=1");
	exit();
}

require('admin/config.php');
require('admin/fun.php'); ?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Customer Address - Jaconet Trades</title>

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
				<li class="active" >Add Address</li>
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
                          <h3>Address:</h3>
                       </div>
                       <div class='row p-5'>
                          <div class="col-md-12"> 
                    <?php if (isset($_GET['add_address'])) {
                      ?>    
                     <form action='insert.php?new_address_default' method='post'>
                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label><b style="color: red;">*</b>Local Address:</label>
                           <input type='text' class='input'name='cust_address' required=''> 
                         </div>
                      </div>

                       <div class='col-md-6'>
                         <div class='form-group'>
                         <label><b style="color: red;">*</b>Pincode:</label>
                           <input type='text' class='input'name='cust_pincode' required=''> 
                         </div>
                      </div>
                              
                       <div class='col-md-6'>
                         <div class='form-group'>
                         <label><b style="color: red;">*</b>City:</label>
                           <input type='text' class='input'name='cust_city' required=''> 
                         </div>
                      </div>

                       <div class='col-md-6'>
                         <div class='form-group'>
                         <label><b style="color: red;">*</b>State:</label>
                           <input type='text' class='input' name='cust_state' required=''> 
                         </div>
                      </div>

                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label><b style="color: red;">*</b>Country:</label>
                           <input type='text' class='input' name='cust_country' required=''> 
                         </div>
                      </div>

                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label>Landmark:</label>
                           <input type='text' class='input' name='cust_nearby'> 
                         </div>
                      </div>

                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label>Contact Person Name:</label>
                           <input type='text' class='input' name='cust_delivery_contact'> 
                         </div>
                      </div>

                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label>Contact Person no::</label>
                           <input type='text' class='input' name='cust_delivery_contact_no'> 
                         </div>
                      </div>
                            
                       <div class='col-md-12' style="margin-bottom: 1%;">
                           <div class='row'>
                               <div class='col-md-6'>
                                   <div class='form-group'>
                                      <button class='btn btn-success btn-sm pull-left' type='submit' name='submit'>Save Address</button>
                                    </div>
                                </div>
                        </form>
                        <?php
                      } elseif(isset($_GET['add_at_checkout'])){
                        ?>
                        <form action='insert.php?new_address_checkout' method='post'>
                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label><b style="color: red;">*</b>Local Address:</label>
                           <input type='text' class='input'name='cust_address' required=''> 
                         </div>
                      </div>

                       <div class='col-md-6'>
                         <div class='form-group'>
                         <label><b style="color: red;">*</b>Pincode:</label>
                           <input type='text' class='input'name='cust_pincode' required=''> 
                         </div>
                      </div>
                              
                       <div class='col-md-6'>
                         <div class='form-group'>
                         <label><b style="color: red;">*</b>City:</label>
                           <input type='text' class='input'name='cust_city' required=''> 
                         </div>
                      </div>

                       <div class='col-md-6'>
                         <div class='form-group'>
                         <label><b style="color: red;">*</b>State:</label>
                           <input type='text' class='input' name='cust_state' required=''> 
                         </div>
                      </div>

                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label><b style="color: red;">*</b>Country:</label>
                           <input type='text' class='input' name='cust_country' required=''> 
                         </div>
                      </div>

                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label>Landmark:</label>
                           <input type='text' class='input' name='cust_nearby'> 
                         </div>
                      </div>

                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label>Contact Person Name:</label>
                           <input type='text' class='input' name='cust_delivery_contact'> 
                         </div>
                      </div>

                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label>Contact Person no::</label>
                           <input type='text' class='input' name='cust_delivery_contact_no'> 
                         </div>
                      </div>
                            
                       <div class='col-md-12' style="margin-bottom: 1%;">
                           <div class='row'>
                               <div class='col-md-6'>
                                   <div class='form-group'>
                                      <button class='btn btn-success btn-sm pull-left' type='submit' name='submit'>Save Address</button>
                                    </div>
                                </div>
                        </form>
                       <?php

                      }

                      ?>
                           </div>
                         </div>        
                      </div> 
                    </div>
				</div>
			</div>
		</div>
	</section>

<?php include('footer_2.php'); ?>