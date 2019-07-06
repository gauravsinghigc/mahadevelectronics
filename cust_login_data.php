<?php 

session_start();
if(empty($_SESSION['id'])){
	header("location: customer_login.php?login_msg=1");
	exit();
}

require('admin/config.php');
require('admin/fun.php'); 
require 'texts.php';?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Security Data - Jaconet Trades</title>

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
	<?php

	include('header.php');
	include('navbar.php');
	 ?>
	


	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb pull-left">
				<li><a href="index.php">Home</a></li>
				<li><a href="customer_account.php"><?php customer_name(); ?></a></li>
				<li class="active" >Security Data</li>
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
                          <h3>Login and Security Details</h3>
                       </div>
                       <div class='row p-5'>
                          <div class="col-md-12">

      
                      <?php
                      ini_set("display_errors", 0);
                      $login_update_msg = $_GET['login_update_msg'];
                      if($login_update_msg){
                      	echo "<code class='bg-success'> Successfully Updated!</code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_login_data.php' />";
                      }
                      $login_update_err = $_GET['login_update_err'];
                      if($login_update_err){
                      	echo "<code class='bg-danger'> Failed to Update!</code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_login_data.php' />";
                      }
                     customer_security_details();
                        ?>
                           </div>
                         </div>        
                      </div> 
                    </div>
                     <div class='section-title'>
                          <h5>Change Password:</h5>
                       </div>

                     <form action='cust_password_update.php' method='post'>
                     	<?php
                      ini_set("display_errors", 0);
                      $pass_msg = $_GET['pass_msg'];
                      if($pass_msg){
                      	echo "<code class='bg-success'> Your Password Changed Successfully!</code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_login_data.php' />";
                      }
                      $pass_err = $_GET['pass_err'];
                      if($pass_err){
                      	echo "<code class='bg-danger'> Password Match, but <b>Failed</b> to Update!. Contact To Admin.</code><br><br>
                      	<meta http-equiv='refresh' content='3; cust_login_data.php' />";
                      }
                      ?>
                      <div class='col-md-6'>
                         <div class='form-group'>
                         <label>Enter New Password:</label>
                         <?php $pass_do_not_match = $_GET['pass_do_not_match']; if($pass_do_not_match){
                         	echo "<code class='bg-danger'>Password Do Not Match!</code>";
                         }
                         ?>
                           <input type='Password' class='input' name='cust_password' required="" placeholder="********"> 
                         </div>
                      </div>

                       <div class='col-md-6'>
                         <div class='form-group'>
                         <label>Re-Enter New Password:</label>
                         <?php $pass_do_not_match = $_GET['pass_do_not_match']; if($pass_do_not_match){
                         	echo "<code class='bg-danger'>Password Do Not Match!</code>";
                         }
                         ?>
                           <input type='Password' class='input' name='cust_password1' required="" placeholder="********"> 
                         </div>
                      </div>
                            
                       <div class='col-md-12'>
                           <div class='row'>
                               <div class='col-md-6'>
                                   <div class='form-group'>
                                      <button class='btn btn-danger btn-sm pull-right' type='submit' name='submit'>Change Password Only</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <a href="customer_account.php">
                                   <div class="form-group">
                                      <a href="customer_account.php" class="font-white btn btn-sm btn-info" style="color:white !important;"><b>Back to Account Page</b></a>
                                    </div>
                                </a>
                                </div>
                        </form>
				</div>
			</div>
		</div>
	</section>

<?php include('footer.php'); ?>