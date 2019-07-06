	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header" style="padding-top: 10px; padding-bottom: 10px;">
			<div class="container">
				<div class="pull-left">
					<span><b>Contact:</b><a href="mailto:<?php echo $mail_id; ?>"> <?php echo $mail_id; ?></a></span>&nbsp;&nbsp;&nbsp;
					<span><b>Phone:</b><a href="tel:<?php echo $phone;?>"> <?php echo $phone;?></a></span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
                         <?php

																								login_and_customer_name_with_condition();

																								?>
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
					<!--Logo -->
					<div class="header-logo" style="width: 47%;">
						<a class="logo" href="index.php">
							<img src="<?php echo $logo_src;?>" alt="<?php echo $title;?>" title="<?php echo $title;?>" style="width: 49%;">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search" style="width: 100% !important;padding: 0%;">
						<form action="search.php" method="post">
							<input class="input search-input" type="text" name="search_query" placeholder="Enter your product" style="padding-left: 5%;width: 100%; ">
							<button class="search-btn" type="submit" name="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<?php

					customer_action_after_login();
					?>

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a href="shopping.php">
								<div class="header-btns-icon p_t_a" style="padding-top: 8%;">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">
										<?php 
                                  	$ip_address = ip();
																																			$customer_id = $_SESSION['id'];
																																			$sql = "SELECT * from cart WHERE ip_address='".ip()."' and customer_id='$customer_id'";
																																			$query = mysqli_query($con, $sql);
																																		if ($query == true) {
																																			  
																																			$count = mysqli_num_rows($query);
																																			echo $count;

																																		} else {
																																			 echo "0";
																																		}
									 ?></span>
								</div>
								<strong class="text-uppercase">Cart Items</strong>
								<br>
								<span><b>Rs.</b>
                                 <?php price(); ?>
								</span>
							</a>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->
	