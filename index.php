<?php
 
    session_start();
     $temp = 1;
    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
    {
		$temp = 2;
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
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
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
											echo '0';
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

	<!-- Slider -->

	<div class="main_slider" style="background-image:url(images/slider1905x700.jpg)">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6>Winter / Spring Collection 2017</h6>
						<h1>Get up to 30% Off </h1>
						<div class="red_button shop_now_button"><a href="categories.php">shop now</a></div>
					</div>
				</div>fhd
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/banner_redwine.jpg)">
						<div class="banner_category">
							<a href="activeCategoryScript.php/?redWines">red</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/banner_whitewine.jpg)">
						<div class="banner_category">
							<a href="activeCategoryScript.php/?whiteWines">white</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="banner_item align-items-center" style="background-image:url(images/banner_champagne.jpg)">
						<div class="banner_category">
							<a href="activeCategoryScript.php/?champagne">champagne</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>New Arrivals</h2>
					</div>
				</div>
			</div>
			<div class="row align-items-center">
				<div class="col text-center">
					<div class="new_arrivals_sorting">
						<ul class="arrivals_grid_sorting clearfix button-group filters-button-group">
							<form method="POST" action="newArriwalsScript.php">
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center active is-checked" data-filter="*">all</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".red">Red</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".white">White</li>
							<li class="grid_sorting_button button d-flex flex-column justify-content-center align-items-center" data-filter=".champagne">Champagne</li>
							</form>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product-grid" data-isotope='{ "itemSelector": ".product-item", "layoutMode": "fitRows" }'>

						<?php
						$i = 1;
						require_once "connection.php";
						$connection = @new mysqli($host, $db_user, $db_password, $db_name);
						if ($connection->connect_errno!=0) {
							echo "Error:".$connection->connect_errno;
						}
						if(isset($_SESSION['table_index_cart'])) {
							$item_in_cart = $_SESSION['table_index_cart'];
						}
						else {
							$item_in_cart = 0;
						}
						if(isset($_SESSION['checkout_array'])) {
							$cart_array = $_SESSION['checkout_array'];
						}
						else {
							$cart_array = NULL;
						}
						while($i <= 10) {

							$type = mysqli_fetch_assoc(@$connection->query(sprintf("SELECT Type_Name FROM wines as w inner join ref_types as t on w.Type_Code = t.Type_Code where w.Wine_ID = '%s';", $i)));
							$name = mysqli_fetch_assoc(@$connection->query(sprintf("SELECT Name_Value FROM wines as w inner join ref_names as n on w.Name_Code = n.Name_Code where w.Wine_ID = '%s';", $i)));
							$price = mysqli_fetch_assoc(@$connection->query(sprintf("SELECT Price_Value FROM wines as w inner join ref_prices as p on w.Price_Code = p.Price_Code where w.Wine_ID = '%s';", $i)));
							
							if($i == 1 || $i == 4 || $i == 9) {
								$lower_price = $price['Price_Value'] - 5;
							
								echo '<div class="product-item '.$type['Type_Name'].'">';
									echo '<div class="product discount product_filter">';
										echo '<div class="product_image">';
											echo '<img src="images/product_'.$i.'_square.jpg" alt="">';
										echo '</div>';
										echo '<div class="favorite favorite_left"></div>';
										echo '<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$5</span></div>';
										echo '<div class="product_info">';
											echo '<h6 class="product_name"><a href="single.php?product='.$i.'">'.$name['Name_Value'].'</a></h6>';
											echo '<div class="product_price">$'.$lower_price.'<span>$'.$price['Price_Value'].'</span></div>';
										echo '</div>';
									echo '</div>';
									echo '<div class="red_button add_to_cart_button"><a href="addToCartScript.php?cart='.$item_in_cart.'&productID='.$i.'&quantity=1&array='.$cart_array.'">add to cart</a></div>';
								echo '</div>';
							}
							
							if($i == 3 || $i == 7 || $i == 10) {
							
								echo '<div class="product-item '.$type['Type_Name'].'">';
									echo '<div class="product discount product_filter">';
										echo '<div class="product_image">';
											echo '<img src="images/product_'.$i.'_square.jpg" alt="">';
										echo '</div>';
										echo '<div class="favorite favorite_right"></div>';
										echo '<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>';
										echo '<div class="product_info">';
											echo '<h6 class="product_name"><a href="single.php?product='.$i.'">'.$name['Name_Value'].'</a></h6>';
											echo '<div class="product_price">$'.$price['Price_Value'].'</div>';
										echo '</div>';
									echo '</div>';
									echo '<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>';
								echo '</div>';
							}
							
							if($i == 2 || $i == 6) {
							
								echo '<div class="product-item '.$type['Type_Name'].'">';
									echo '<div class="product discount product_filter">';
										echo '<div class="product_image">';
											echo '<img src="images/product_'.$i.'_square.jpg" alt="">';
										echo '</div>';
										echo '<div class="favorite favorite_left"></div>';
										echo '<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>';
										echo '<div class="product_info">';
											echo '<h6 class="product_name"><a href="single.php?product='.$i.'">'.$name['Name_Value'].'</a></h6>';
											echo '<div class="product_price">$'.$price['Price_Value'].'</div>';
										echo '</div>';
									echo '</div>';
									echo '<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>';
								echo '</div>';
							}
							
							if($i == 5 || $i == 8) {
							
								echo '<div class="product-item '.$type['Type_Name'].'">';
									echo '<div class="product discount product_filter">';
										echo '<div class="product_image">';
											echo '<img src="images/product_'.$i.'_square.jpg" alt="">';
										echo '</div>';
										echo '<div class="favorite favorite_left"></div>';
										echo '<div class="product_info">';
											echo '<h6 class="product_name"><a href="single.php?product='.$i.'">'.$name['Name_Value'].'</a></h6>';
											echo '<div class="product_price">$'.$price['Price_Value'].'</div>';
										echo '</div>';
									echo '</div>';
									echo '<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>';
								echo '</div>';
							}
							
							$i++;
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deal of the week -->

	<div class="deal_ofthe_week">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="deal_ofthe_week_img">
						<img src="images/deal_ofthe_week.png" alt="">
					</div>
				</div>
				<div class="col-lg-6 text-right deal_ofthe_week_col">
					<div class="deal_ofthe_week_content d-flex flex-column align-items-center float-right">
						<div class="section_title">
							<h2>Deal Of The Week</h2>
						</div>
						<ul class="timer">
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="day" class="timer_num"></div>
								<div class="timer_unit">Day</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="hour" class="timer_num"></div>
								<div class="timer_unit">Hours</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="minute" class="timer_num"></div>
								<div class="timer_unit">Mins</div>
							</li>
							<li class="d-inline-flex flex-column justify-content-center align-items-center">
								<div id="second" class="timer_num"></div>
								<div class="timer_unit">Sec</div>
							</li>
						</ul>
						<div class="red_button deal_ofthe_week_button"><a href="single.php?product=11">shop now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<div class="section_title new_arrivals_title">
						<h2>Best Sellers</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="product_slider_container">
						<div class="owl-carousel owl-theme product_slider">
							<?php
								$i = 1;
								require_once "connection.php";
								$connection = @new mysqli($host, $db_user, $db_password, $db_name);
								if ($connection->connect_errno!=0) {
									echo "Error:".$connection->connect_errno;
								}
								
								while($i <= 6) {

									$type = mysqli_fetch_assoc(@$connection->query(sprintf("SELECT Type_Name FROM wines as w inner join ref_types as t on w.Type_Code = t.Type_Code where w.Wine_ID = '%s';", $i)));
									$name = mysqli_fetch_assoc(@$connection->query(sprintf("SELECT Name_Value FROM wines as w inner join ref_names as n on w.Name_Code = n.Name_Code where w.Wine_ID = '%s';", $i)));
									$price = mysqli_fetch_assoc(@$connection->query(sprintf("SELECT Price_Value FROM wines as w inner join ref_prices as p on w.Price_Code = p.Price_Code where w.Wine_ID = '%s';", $i)));
									
									if($i == 1 || $i == 4) {
										$lower_price = $price['Price_Value'] - 5;
										
										echo '<div class="owl-item product_slider_item">';
											echo '<div class="product-item">';
												echo '<div class="product discount">';
													echo '<div class="product_image">';
														echo '<img src="images/product_'.$i.'_square.jpg" alt="">';
													echo '</div>';
													echo '<div class="favorite favorite_left"></div>';
													echo '<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$5</span></div>';
													echo '<div class="product_info">';
														echo '<h6 class="product_name"><a href="single.php?product='.$i.'">'.$name['Name_Value'].'</a></h6>';
														echo '<div class="product_price">$'.$lower_price.'<span>$'.$price['Price_Value'].'</span></div>';
													echo '</div>';
												echo '</div>';
											echo '</div>';
										echo '</div>';
									}
									
									if($i == 3) {
										echo '<div class="owl-item product_slider_item">';
											echo '<div class="product-item">';
												echo '<div class="product">';
													echo '<div class="product_image">';
														echo '<img src="images/product_'.$i.'_square.jpg" alt="">';
													echo '</div>';
													echo '<div class="favorite"></div>';
													echo '<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>';
													echo '<div class="product_info">';
														echo '<h6 class="product_name"><a href="single.php?product='.$i.'">'.$name['Name_Value'].'</a></h6>';
														echo '<div class="product_price">'.$price['Price_Value'].'</div>';
													echo '</div>';
												echo '</div>';
											echo '</div>';
										echo '</div>';
									}
									
									if($i == 2 || $i == 6) {		
										echo '<div class="owl-item product_slider_item">';
											echo '<div class="product-item accessories">';
												echo '<div class="product">';
													echo '<div class="product_image">';
														echo '<img src="images/product_'.$i.'_square.jpg" alt="">';
													echo '</div>';
													echo '<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>';
													echo '<div class="favorite favorite_left"></div>';
													echo '<div class="product_info">';
														echo '<h6 class="product_name"><a href="single.php?product='.$i.'">'.$name['Name_Value'].'</a></h6>';
														echo '<div class="product_price">$'.$price['Price_Value'].'</div>';
													echo '</div>';
												echo '</div>';
											echo '</div>';
										echo '</div>';
										
									}
									
									if($i == 5) {			
										echo '<div class="owl-item product_slider_item">';
											echo '<div class="product-item">';
												echo '<div class="product">';
													echo '<div class="product_image">';
														echo '<img src="images/product_'.$i.'_square.jpg" alt="">';
													echo '</div>';
													echo '<div class="favorite"></div>';
													echo '<div class="product_info">';
														echo '<h6 class="product_name"><a href="single.php?product='.$i.'">'.$name['Name_Value'].'</a></h6>';
														echo '<div class="product_price">$'.$price['Price_Value'].'</div>';
													echo '</div>';
												echo '</div>';
											echo '</div>';
										echo '</div>';
									}
									
									$i++;
								}
							?>
						</div>

						<!-- Slider Navigation -->

						<div class="product_slider_nav_left product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-left" aria-hidden="true"></i>
						</div>
						<div class="product_slider_nav_right product_slider_nav d-flex align-items-center justify-content-center flex-column">
							<i class="fa fa-chevron-right" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Benefit -->

	<div class="benefit">
		<div class="container">
			<div class="row benefit_row">
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>free shipping</h6>							
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>cash on delivery</h6>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>7 days return</h6>
						</div>
					</div>
				</div>
				<div class="col-lg-3 benefit_col">
					<div class="benefit_item d-flex flex-row align-items-center">
						<div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
						<div class="benefit_content">
							<h6>open 24h/7days</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
						<h4>Newsletter</h4>
						<p>Subscribe to our newsletter and get 5% off your first purchase</p>
					</div>
				</div>
				<div class="col-lg-6">
					<form action="post">
						<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
							<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
							<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
						</div>
					</form>
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
