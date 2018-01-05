<?php
 
    session_start();
     $temp = 1;
    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
    {
		$temp = 2;
    }
	if(!isset($_GET['product'])) {
		header('Location: categories.php');		
	}
	else {
		$val = $_GET['product'];		
	}
	require_once "connection.php";
	$connection = @new mysqli($host, $db_user, $db_password, $db_name);
	if ($connection->connect_errno!=0) {
		echo "Error:".$connection->connect_errno;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>WinesFromArthur</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="WinesFromArthur website">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/single_styles.css">
<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
</head>

<body>

<div class="super_container">

	<!-- Header -->

	<header class="header trans_300">

		<!-- Top Navigation -->

		<div class="top_nav">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="top_nav_left">free shipping on all u.s orders over $50</div>
					</div>
					<div class="col-md-6 text-right">
						<div class="top_nav_right">
							<ul class="top_nav_menu">

								<!-- My Account -->

								
								<li class="account">
									<a href="">
									<?php 
									if($temp == 1){
										echo "Log In or Create new Account";
									} 
									elseif($temp == 2) {
										echo "My Account";
									}
											
									?>
										
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<?php 
											if($temp == 1){
												echo '<li><a href="signin.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li><li><a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>';
											} 
											elseif($temp == 2) {
												echo '<li><a href="account.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Account</a></li><li><a href="logOutScript.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign Out</a></li>';
											}
												
										?>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Main Navigation -->

		<div class="main_nav_container">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-right">
						<div class="logo_container">
							<a href="index.php">WINES<span>FROM</span>ARTHUR</a>
						</div>
						<nav class="navbar">
							<ul class="navbar_menu">
								<li><a href="index.php">HOME</a></li>
								<li><a href="categories.php">CATEGORIES</a></li>
								<li><a href="contact.php">CONTACT</a></li>
							</ul>
							<ul class="navbar_user">
								<?php 
									if($temp == 1){
									} 
									elseif($temp == 2) {
										echo '<li><a href="account.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>';
									}
								?>
								<li class="checkout">
									<a href="checkout.php">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i>
										<span id="checkout_items" class="checkout_items">
										<?php
											if(isset($_SESSION['items_in_checkout']))
											{
												echo $_SESSION['items_in_checkout'];
												unset($_SESSION['items_in_checkout']);
											}
											else {
											echo "0";
											}
										?>
										
										</span>
									</a>
								</li>
							</ul>
							<div class="hamburger_container">
								<i class="fa fa-bars" aria-hidden="true"></i>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>

	</header>

	<!-- Hamburger Menu -->
	
	<div class="fs_menu_overlay"></div>
	<div class="hamburger_menu">
		<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
		<div class="hamburger_menu_content text-right">
			<ul class="menu_top_nav">
				<?php 
					if($temp == 1){
						echo '<li class="menu_item"><a href="signin.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In</a></li><li class="menu_item"><a href="register.php"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></li>';
					} 
					elseif($temp == 2) {
						echo '<li class="menu_item"><a href="account.php">Account</a></li><li class="menu_item"><a href="logOutScript.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Out</a></li>';
					}	
				?>
				<li class="menu_item"><a href="index.php">HOME</a></li>
				<li class="menu_item"><a href="categories.php">CATEGORIES</a></li>
				<li class="menu_item"><a href="contact.php">CONTACT</a></li>
			</ul>
		</div>
	</div>

	<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="categories.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Category</a></li>
						<li class="active"><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>
						<?php
							$name = mysqli_fetch_assoc(@$connection->query(sprintf("SELECT Name_Value FROM wines as w inner join ref_names as n on w.Name_Code = n.Name_Code where w.Wine_ID = '%s';", $val)));
							echo $name['Name_Value'];
							?>
						</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
								<?php 
								
									if(isset($_SESSION['active_pho']))
									{
										echo $_SESSION['active_pho'];
										unset($_SESSION['active_pho']);
									}
									else {
										echo 			'<a href="activePhotoScript.php/?photo=1&tempvalue='.$val.'"><li class="active"><img src="images/product_'.$val.'_small.jpg" alt="" data-image="images/product_'.$val.'_small.jpg"></li></a>
															<a href="activePhotoScript.php/?photo=2&tempvalue='.$val.'"><li><img src="images/product_'.$val.'_square.jpg" alt="" data-image="images/product_'.$val.'_square.jpg"></li></a>
														</ul>
													</div>
												</div>
												<div class="col-lg-9 image_col order-lg-2 order-1">
													<div class="single_product_image">
														<div class="single_product_image_background" style="background-image:url(images/product_'.$val.'_single_square.jpg)"></div>
													</div>
												</div>';
									}
								?>

					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2>
						<?php
							$name = mysqli_fetch_assoc(@$connection->query(sprintf("SELECT Name_Value FROM wines as w inner join ref_names as n on w.Name_Code = n.Name_Code where w.Wine_ID = '%s';", $val)));
							echo $name['Name_Value'];
						?>
						</h2>
						<p>Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...</p>
					</div>
					<div class="free_delivery d-flex flex-row align-items-center justify-content-center">
						<span class="ti-truck"></span><span>free delivery</span>
					</div>
					
					<?php
								
							$price = mysqli_fetch_assoc(@$connection->query(sprintf("SELECT Price_Value FROM wines as w inner join ref_prices as p on w.Price_Code = p.Price_Code where w.Wine_ID = '%s';", $val)));
							
							if($val == 1 || $val == 4 || $val == 9) {
								$lower_price = $price['Price_Value'] - 5;
								echo '<div class="original_price">$'.$price['Price_Value'].'</div>';
								echo '<div class="product_price">$'.$lower_price.'</div>';
							}
							else {
								echo '<br /><div class="product_price">$'.$price['Price_Value'].'</div>';
							}
						?>
					<ul class="star_rating">
					<?php 
					$tymp = $val % 5;
					if($tymp == 0) $tymp = $tymp + 3;
					if($tymp == 1) $tymp = $tymp + 3;
					if($tymp == 2) $tymp = $tymp + 3;
					$rest_of_tymp = 5 - $tymp;
							while($tymp > 0) {
							echo '<li><i class="fa fa-star" aria-hidden="true"></i></li>';
							$tymp--;
							}
							while($rest_of_tymp > 0) {
							echo '<li><i class="fa fa-star-o" aria-hidden="true"></i></li>';
							$rest_of_tymp--;
							}
					
					?>

					</ul>
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						<div class="quantity_selector">
						
						<!--Dodac skrypt obslugujacy liczebnosc-->
							<span class="minus"><i class="fa fa-minus" aria-hidden="true"></i></span>
							<span id="quantity_value">1</span>
							<span class="plus"><i class="fa fa-plus" aria-hidden="true"></i></span>
						</div>
						<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
					</div>
				</div>
			</div>
		</div>

	</div>


	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="index.php">Return</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.php">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer_nav_container">
						<div class="cr">©2018 All Rights Reserverd. This page is made with <i class="fa fa-html5" aria-hidden="true"></i> and <i class="fa fa-css3" aria-hidden="true"></i> by <a href="#">Artur Karliński</a></div>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>
</body>

</html>