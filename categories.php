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
<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="styles/categories_styles.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
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

	<div class="container product_section_container">
		<div class="row">
			<div class="col product_section clearfix">

				<!-- Breadcrumbs -->

				<div class="breadcrumbs d-flex flex-row align-items-center">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="categories.php"><i class="fa fa-angle-right" aria-hidden="true"></i>Category</a></li>
						<li class="active"><a href=""><i class="fa fa-angle-right" aria-hidden="true"></i>
						
						<?php
						if (isset($_SESSION['nav_active_cat']))
						{
							echo $_SESSION['nav_active_cat'];
							unset($_SESSION['nav_active_cat']);
						}
						else {
							echo 
							'All Products';	
						}							
						?>
						
						
						</a></li>
					</ul>
				</div>

				<!-- Sidebar -->

				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Product Category</h5>
						</div>
						<ul class="sidebar_categories">
						<form method="GET" action="activeCategoryScript.php">
						<?php
						if (isset($_SESSION['active_cat']))
						{
							echo $_SESSION['active_cat'];
							unset($_SESSION['active_cat']);
						}
						else {
							echo 
							'<li class="active"><a href="activeCategoryScript.php/?allProducts" ><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>All Products</a> </li>
							<li><a href="activeCategoryScript.php/?redWines" >Red</a></li>
							<li><a href="activeCategoryScript.php/?whiteWines" >White</a></li>
							<li><a href="activeCategoryScript.php/?champagne" >Champagne</a></li>';	
						}							
						?>
						</form>
						
							
						</ul>
					</div>

					<!-- Price Range Filtering -->
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Filter by Price</h5>
						</div>
						<p>
							<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
						</p>
						<div id="slider-range"></div>
						<div class="filter_button"><span>filter</span></div>
					</div>

					<!-- Sweetness -->
					<div class="sidebar_section">
						<div class="sidebar_title">
							<h5>Sweetness</h5>
						</div>
						<ul class="checkboxes">
							<li class="active"><i class="fa fa-square" aria-hidden="true"></i><span>Sweet</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Semi-sweet</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Semi-dry</span></li>
							<li><i class="fa fa-square-o" aria-hidden="true"></i><span>Dry</span></li>
						</ul>
					</div>
				</div>

				<!-- Main Content -->

				<div class="main_content">

					<!-- Products -->

					<div class="products_iso">
						<div class="row">
							<div class="col">

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_top">
									<ul class="product_sorting">
										<li>
											<span class="type_sorting_text">Default Sorting</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_type">
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default Sorting</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
												<li class="type_sorting_btn" data-isotope-option='{ "sortBy": "name" }'><span>Product Name</span></li>
											</ul>
										</li>
										<li>
											<span>Show</span>
											<span class="num_sorting_text">12</span>
											<i class="fa fa-angle-down"></i>
											<ul class="sorting_num">
												<li class="num_sorting_btn"><span>6</span></li>
												<li class="num_sorting_btn"><span>12</span></li>
												<li class="num_sorting_btn"><span>24</span></li>
											</ul>
										</li>
									</ul>
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>

								<!-- Product Grid -->

								<div class="product-grid">

									<!-- Product 1 -->

									<div class="product-item champagne">
										<div class="product discount product_filter">
											<div class="product_image">
												<img src="images/product_1_square.jpg" alt="">
											</div>
											<div class="favorite favorite_left"></div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-$20</span></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.php">Signature Series Ice Cuvée</a></h6>
												<div class="product_price">$520.00<span>$590.00</span></div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									</div>

									<!-- Product 2 -->

									<div class="product-item red">
										<div class="product product_filter">
											<div class="product_image">
												<img src="images/product_2_square.jpg" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.php">Trius Cabernet Franc 2015</a></h6>
												<div class="product_price">$610.00</div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									</div>

									<!-- Product 3 -->

									<div class="product-item red">
										<div class="product product_filter">
											<div class="product_image">
												<img src="images/product_3_square.jpg" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.php">Wayne Gretzky Estate Series Shiraz Cabernet 2015</a></h6>
												<div class="product_price">$120.00</div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									</div>

									<!-- Product 4 -->

									<div class="product-item white">
										<div class="product product_filter">
											<div class="product_image">
												<img src="images/product_4_square.jpg" alt="">
											</div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
											<div class="favorite favorite_left"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.php">Trius Sauvignon Blanc 2016</a></h6>
												<div class="product_price">$410.00</div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									</div>

									<!-- Product 5 -->

									<div class="product-item red">
										<div class="product product_filter">
											<div class="product_image">
												<img src="images/product_5_square.jpg" alt="">
											</div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-8%</span></div>
											<div class="favorite favorite_left"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.php">Thirty Bench Winemaker's Red 2013</a></h6>
												<div class="product_price">$180.000<span>$200.00</span></div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									</div>

									<!-- Product 6 -->

									<div class="product-item white">
										<div class="product discount product_filter">
											<div class="product_image">
												<img src="images/product_6_square.jpg" alt="">
											</div>
											<div class="favorite favorite_left"></div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>-13%</span></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.php">Skinnygrape Pinot Grigio</a></h6>
												<div class="product_price">$520.00<span>$590.00</span></div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									</div>

									<!-- Product 7 -->

									<div class="product-item red">
										<div class="product product_filter">
											<div class="product_image">
												<img src="images/product_7_square.jpg" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.php">Rebellion Shiraz</a></h6>
												<div class="product_price">$610.00</div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									</div>

									<!-- Product 8 -->

									<div class="product-item white">
										<div class="product product_filter">
											<div class="product_image">
												<img src="images/product_8_square.jpg" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_bubble product_bubble_left product_bubble_green d-flex flex-column align-items-center"><span>new</span></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.php">Black Cellar Sauvignon Blanc</a></h6>
												<div class="product_price">$120.00</div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									</div>

									<!-- Product 9 -->

									<div class="product-item champagne">
										<div class="product product_filter">
											<div class="product_image">
												<img src="images/product_9_square.jpg" alt="">
											</div>
											<div class="product_bubble product_bubble_right product_bubble_red d-flex flex-column align-items-center"><span>sale</span></div>
											<div class="favorite favorite_left"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.php">XOXO Pinot Grigio-Chardonnay Sparkling</a></h6>
												<div class="product_price">$410.00</div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									</div>

									<!-- Product 10 -->

									<div class="product-item champagne">
										<div class="product product_filter">
											<div class="product_image">
												<img src="images/product_10_square.jpg" alt="">
											</div>
											<div class="favorite"></div>
											<div class="product_info">
												<h6 class="product_name"><a href="single.php">Trius Brut</a></h6>
												<div class="product_price">$180.00</div>
											</div>
										</div>
										<div class="red_button add_to_cart_button"><a href="#">add to cart</a></div>
									</div>
								</div>

								<!-- Product Sorting -->

								<div class="product_sorting_container product_sorting_container_bottom clearfix">
									<span class="showing_results">Showing 1–3 of 12 results</span>
									<div class="pages d-flex flex-row align-items-center">
										<div class="page_current">
											<span>1</span>
											<ul class="page_selection">
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">3</a></li>
											</ul>
										</div>
										<div class="page_total"><span>of</span> 3</div>
										<div id="next_page_1" class="page_next"><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></div>
									</div>

								</div>

							</div>
						</div>
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
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="js/categories_custom.js"></script>
</body>

</html>