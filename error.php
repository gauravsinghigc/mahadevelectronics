<?php 
require('admin/config.php');
require('admin/fun.php'); ?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Error - Jaconetapparels</title>

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
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
			<div class="section-title">
								<h4 class="title">Something went wrong!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!</h4>
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
							<img src="./img/logo.png" alt="Jaconet Apparels" style="width: 50%;">
						</a>
					</div>
					<!-- /Logo -->
				</div>
				<div class="pull-right">
					<!-- Logo -->
					<div class="header-logo">
						<div class="section-title">
								<h4 class="title">Contact To Your System Developer</h4>
			           </div>
					</div>
					<!-- /Logo -->
				</div>
				<div class="row">
					<div class="col-md-12"><hr>
						<div class="col-md-12">
							<p><b style='color:red;'>OOOppssss....</b>, the request or which you want to execute is currently faced some problem and is under some coding issue. Please contact to your Developer to know more about this type Error.</p>

							<P><b>Note:</b> Please ask your Developer about The <b style='color:red;'>Error Type:</b> Which is Mention Belowed, when your contacting your developer for early solution of the problem.</P>

							<?php

							if (isset($_GET['product_id'])) {
								echo "<p><b style='color:red;'>Error Type:</b>  <em>Product Customization Insertion and Updation Error</em>, means there is error in codes through which customization insertion and updation is not possible. to know more... contact to developer<p>";
								echo "<p>Go to <a href='product_details.php?product_id=".$_GET['product_id']."'>
							<button class='btn btn-info btn-sm'>Product Page</button> </a></p>";
							} else {
								header("location: index.php");
							}

                         
							?>
						</div>
						<div class="col-md-6">
							
						</div>
					</div>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->
        
	<?php include('admin/footer.php'); ?>