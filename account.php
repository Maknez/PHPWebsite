<?php
 
    session_start();
     
    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
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
<link rel="stylesheet" type="text/css" href="styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/register.css">
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

								<!-- Currency / Language / My Account -->

								
								<li class="account">
									<a href="account.php">
										My Account
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="account_selection">
										<li><a href="account.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Account</a></li>										
										<li><a href="logOutScript.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign Out</a></li>
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
								<li><a href="account.php"><i class="fa fa-user" aria-hidden="true"></i></a></li>
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
				<li class="menu_item"><a href="account.php">Account</a></li>
				<li class="menu_item"><a href="logOutScript.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign Out</a></li>
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
						<li class="active"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>My Account</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-lg-6 contact_col">
				<div class="contact_contents">
					<h2>My Account</h2>
					 <div>
					 <p></p>
					<?php
					require_once "connection.php";
					$connection = @new mysqli($host, $db_user, $db_password, $db_name);
					if ($connection->connect_errno!=0) {
						echo "Error:".$connection->connect_errno;
					}
					$wynik =  @$connection->query(sprintf("SELECT * FROM uzytkownicy WHERE login='%s'", $_SESSION['login']));
					$row = mysqli_fetch_assoc($wynik);

					echo "<p>Name: ".$row['name']."</p>";
					echo "<p>Surname: ".$row['surname']."</p>";
					echo "<p>Email: ".$row['email']."</p>";
					echo "<p>Login: ".$row['login']."</p>";	
					

					
					
					mysqli_close($connection);
					
					
					?>
					</div>
					<div>
					<br /><br /><br />
					<h3>Change the password</h3>
					<?php 
					
					if (isset($_SESSION['error_mess']))
					{
						echo $_SESSION['error_mess'];
						unset($_SESSION['error_mess']);
					}
					else 
						echo '<p>Fill out the form below to change the password.</p>';				
					?>
					<form method="POST" action="changePasswordScript.php">
						<div>
							<input type="hidden" name="login" value="<?php echo $_SESSION['login']; ?>">
							<input id="input_name" class="form_input input_name input_ph" type="text" name="currentPassword" placeholder="Type current password" required="required" data-error="Current password is required.">
							<input id="input_name" class="form_input input_name input_ph" type="password" name="newPassword1" placeholder="Type new password" required="required" data-error="New password is required.">
							<input id="input_name" class="form_input input_name input_ph" type="password" name="newPassword2" placeholder="Repeat new password" required="required" data-error="Repeat password is required.">
						</div>	
						<div>
							<input type="submit" class="red_button message_submit_btn trans_300" value="Change Password" name="changeThePass">
						</div>
					</form>
					
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