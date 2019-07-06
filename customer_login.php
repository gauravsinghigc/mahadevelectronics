<?php 
require('admin/config.php');
require('admin/fun.php');
require('texts.php'); 

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Login/Register - <?php echo $title;?></title>

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

	echo $favicon; ?>

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to <?php echo $title;?></span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><b><a href="customer_login.php">Login/Register</a></b> Page for Customer!
						



						</li>
						<!--<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
								<li><a href="#">EUR (€)</a></li>
								<li><a href="#">EUR (€)</a></li>
							</ul>
						</li>-->
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

				<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="index.php">
							<img src="<?php echo $logo_src; ?>" alt=" <?php echo $title;?>" title=" <?php echo $title;?>" style="width:40%;">
						</a>
					</div>
					<!-- /Logo -->
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->
        
        <!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="customer_login.php">Login <b>or</b> Register </a></li>
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
					<div class="col-md-6">
						<div class="billing-details">
							<form action="cust_login.php" method="post">
								<?php 

								ini_set("display_errors", 0);
								$pass_err = $_GET['pass_err'];
								if($pass_err){
									echo "<p><code><b>X</b> &nbsp;<b>Error!</b> Wrong Username and Password &nbsp; <b>X</b></code></p>";
								}
								?>
								<?php 
								ini_set("display_errors", 0);
								$var_err = $_GET['var_err'];
								if($var_err){
									echo "<p><code><b>X</b> &nbsp;<b>Error!</b> Wrong Verification Code. &nbsp; <b>X</b></code></p>";
								}
								?>
								<?php 
								ini_set("display_errors", 0);
								$login_msg = $_GET['login_msg'];
								if($login_msg){
									echo "<p><code><b>X</b> &nbsp;<b>Error!</b> Login First. &nbsp; <b>X</b></code></p>";
								}
								?>
								
							
							<div class="section-title">
								<h4 class="title">Login</h4>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="cust_username" placeholder="Username" required="">
							</div>
							<div class="form-group">
								<input class="input" type="password" id="password" name="cust_password" placeholder="*********" required="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="varification" placeholder="4+5=" required="">
							</div>
							<div class="form-group">
			                     <script>
				             function myFunction() {
					           var x = document.getElementById("password");
					             if (x.type === "password") {
					                	x.type = "text";
					               } else {
					              	x.type = "password";
					                 }
			                 	}
			                  </script>
			                  <input id="check3" name="check3" type="checkbox" value="show password" onclick="myFunction()">
					          <label class="check" for="check3">Show password</label>
							</div> 
							<div class="form-group">
								<button class="btn btn-danger pull-right btn-lg" type="submit" name="submit">Login</button>
							</div> 
						</form>
						</div>
					</div>

					<div class="col-md-6">
						<div class="shiping-methods">
                              <?php 

								ini_set("display_errors", 0);
								$pass_err_regis = $_GET['pass_err_regis'];
								if($pass_err_regis){
									echo "<p><code><b>X</b> &nbsp;<b>Error!</b> Wrong Username and Password &nbsp; <b>X</b></code></p>";
								}
								?>
							<div class="section-title">
								<h4 class="title">New User? <b>Register</b></h4>
							</div>
							<form action="cust_register.php" method="post">
							<div class="form-group">
								<input class="input" type="text" name="cust_first_name" placeholder="First Name" required="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="cust_last_name" placeholder="Last Name" required="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="cust_email_id" placeholder="Email-id" required="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="cust_mobile" placeholder="Mobile No:" required="">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="cust_username" placeholder="Username" required="">
							</div>
							<div class="form-group">
								<input class="input" type="password" id="password"  name="cust_password" placeholder="Password" required="">
							</div>
							<div class="form-group">
								<input class="input" type="password" name="cust_password_2" placeholder="Re-enter Password" required="">
							</div>
							<div class="form-group">
								<button class="btn btn-success btn-lg" type="submit" name="submit">Register</button>
							</div> 
						</form>
						</div>
					</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
	<?php include('footer.php'); ?>