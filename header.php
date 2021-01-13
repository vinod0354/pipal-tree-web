<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pipal Tree Studio</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="icon" href="assets/images/pipal-tree.png">

	<!-- CSS
	============================================ -->
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

	<!-- FontAwesome CSS -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">

	<!-- Ionicons CSS -->
	<link href="assets/css/ionicons.min.css" rel="stylesheet">

	<!-- Themify CSS -->
	<link href="assets/css/themify-icons.css" rel="stylesheet">

	<!-- Plugins CSS -->
	<link href="assets/css/plugins.css" rel="stylesheet">

	<!-- Helper CSS -->
	<link href="assets/css/helper.css" rel="stylesheet">

	<!-- Main CSS -->
	<link href="assets/css/main.css" rel="stylesheet">


	<!-- Revolution Slider CSS -->
	<link href="assets/revolution/css/settings.css" rel="stylesheet">
	<link href="assets/revolution/css/navigation.css" rel="stylesheet">
	<link href="assets/revolution/custom-setting.css" rel="stylesheet">
	
	<!-- Sweet Alert CSS -->

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

	<!-- Modernizer JS -->
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

	<style>
		nav.site-nav > ul > li {
			margin: 0 10px;
		}
		.header-right-icons .single-icon {
			margin-left: 20px;
		}
		@media only screen and (max-width: 767px){
			.sm-w-50 {
				flex-basis: 100% !important;
			}
		}
		@media only screen and (max-width: 479px) {
			.header-right-icons .single-icon.user-login {
				display: inline-block;
			}
		}
		.lezada-form form input[type="number"]
		{
			font-size: 14px;
			display: block;
			width: 100%;
			padding: 9.5px 0;
			-webkit-transition: all 0.3s ease-in-out;
			-o-transition: all 0.3s ease-in-out;
			transition: all 0.3s ease-in-out;
			color: #333;
			border: 1px solid transparent;
			border-bottom: 2px solid #cccccc;
			background: transparent;
		}
		.pipal-button {
			font-weight: 500;
			display: inline-block;
			letter-spacing: 1px;
			text-transform: uppercase;
			color: #fff !important;
			border: 1px solid #0e502c;
			border-radius: 0;
			background-color: #0e502c;
		}
		.pipal-button:hover {
			color: #0e502c !important;
			background-color: transparent;
		}
		.change-dropdown {
			margin-right: 0;
		}
		.dropdown {
			position: relative;
			display: inline-block;
		}
		.dropdown-content {
			display: none;
			position: absolute;
			right: -75px;
			background-color: #fff;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		.dropdown-content a {
			color: black;
			padding: 12px 16px;
			text-decoration: none;
			display: block;
		}
		.dropdown-content a:hover {background-color: #f1f1f1;}
		.dropdown:hover .dropdown-content {display: block;}
	</style>

</head>

<body>

	<!--=============================================
	=            Header wide topbar         =
	=============================================-->

	<header class="header header-wide-topbar header-sticky">

		<!--=======  header top  =======-->

		<div class="header-top pt-10 pb-10">
			<div class="container wide">
				<!--=======  header top container  =======-->

				<div class="header-top-container">
					<!--=======  header top left  =======-->

					<div class="header-top-left">
						<!--=======  currency change =======-->

						<div class="currency-change change-dropdown">
							<a href="javascript:void(0)"><?php echo $_SESSION['cur_type']; ?></a>

							<ul>
								<li><a class="price-drop" data-id="INR">INR</a></li>
								<li><a class="price-drop" data-id="USD">USD</a></li>
							</ul>
						</div>

						<!--=======  End of currency change =======-->

					</div>

					<!--=======  End of header top left  =======-->

					<!--=======  header top right  =======-->

					<div class="header-top-right">
						<!--=======  top social icons  =======-->

						<div class="top-social-icons">
							<ul>
								<li><a href="//www.twitter.com"><i class="fa fa-twitter"></i></a></li>
								<li><a href="//www.facebook.com"><i class="fa fa-facebook"></i></a></li>
								<li><a href="//www.instagram.com"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>

						<!--=======  End of top social icons  =======-->
					</div>

					<!--=======  End of header top right  =======-->
				</div>

				<!--=======  End of header top container  =======-->
			</div>
		</div>

		<!--=======  End of header top  =======-->

		<!--=======  header bottom  =======-->

		<div class="header-bottom pt-md-40 pb-md-40 pt-sm-40 pb-sm-40">
			<div class="container wide">


				<!--=======  header bottom container  =======-->

				<div class="header-bottom-container">

					<!--=======  logo with off canvas  =======-->

					<div class="logo-with-offcanvas d-flex" style="flex-basis: 15%;">



						<!--=======  logo   =======-->

						<div class="logo d-none d-lg-block">
							<a href="http://pipaltreestudio.com">
								<img src="assets/images/pipal-tree.png" style="height: 70px;" class="img-fluid" alt="">
							</a>
						</div>
						<div class="logo site-mobile-navigation d-block d-lg-none">
							<a href="http://pipaltreestudio.com">
								<img src="assets/images/pipal-tree.png" style="height: 26px;" class="img-fluid" alt="">
							</a>
						</div>

						<!--=======  End of logo   =======-->
					</div>

					<!--=======  End of logo with off canvas  =======-->

					<!--=======  header bottom navigation  =======-->

					<div class="header-bottom-navigation" style="flex-basis: 70%;">
						<div class="site-main-nav d-none d-lg-block">
							<nav class="site-nav center-menu">
								<ul>
									<li class=""><a href="index.php"><b>Home</b></a></li>
                                    <li class=""><a href="products.php?id=1"><b>Kanchipuram silk & cotton</b></a></li>
                                    <li class=""><a href="products.php?id=9"><b>Embroidery</b></a></li>
									<li class=""><a href="#"><b>Moonga tussar</b></a></li>
									<li class=""><a href="#"><b>Khadi cotton</b></a></li>
									<li class=""><a href="#"><b>Mangalagiri silk & cotton</b></a></li>
								</ul>
							</nav>
						</div>
					</div>

					<!--=======  End of header bottom navigation  =======-->

					<!--=======  headeer right container  =======-->

					<div class="header-right-container sm-w-50" style="flex-basis: 15%;">

						<!--=======  header right icons  =======-->

						<div class="header-right-icons d-flex justify-content-end align-items-center h-100">
							<!--=======  single-icon  =======-->

							<div class="single-icon search">
								<a href="javascript:void(0)" id="search-icon">
									<i class="ion-ios-search-strong"></i>
								</a>
							</div>

							<!--=======  End of single-icon  =======-->
							<!--=======  single-icon  =======-->

							<div class="single-icon user-login dropdown">
								<span>
									<a href="#" style="vertical-align: middle;"><i class="ion-android-person"></i></a> <?php echo substr($_SESSION['name'],0,7); ?>
								</span>
								<div class="dropdown-content">
									<a href="order-history.php">Orders</a>
									<a href="logout.php">Logout</a>
								</div>
							</div>

							<!--=======  End of single-icon  =======-->
							<!--=======  single-icon  =======-->

							<div class="single-icon cart">
								<a href="javascript:void(0)" id="offcanvas-cart-icon">
									<i class="ion-ios-cart"></i>
									<?php 
										cart_count();
									?>
								</a>
							</div>
							<!--=======  End of single-icon  =======-->
						</div>
						<!--=======  End of header right icons  =======-->

					</div>

					<!--=======  End of headeer right container  =======-->


				</div>

				<!--=======  End of header bottom container  =======-->

				<!-- Mobile Navigation Start Here -->

				<div class="site-mobile-navigation d-block d-lg-none">
					<div id="dl-menu" class="dl-menuwrapper site-mobile-nav">
						<!--Site Mobile Menu Toggle Start-->
						<button class="dl-trigger hamburger hamburger--spin">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
						<!--Site Mobile Menu Toggle End-->
						<ul class="dl-menu dl-menu-toggle">
							<li class=""><a href="index.php"><b>Home</b></a></li>
							<li class=""><a href="products.php?id=1"><b>Kanchipuram silk &cotton</b></a></li>
							<li class=""><a href="products.php?id=9"><b>Embroidery</b></a></li>
							<li class=""><a href="#"><b>Moonga tussar</b></a></li>
							<li class=""><a href="#"><b>khadi cotton</b></a></li>
							<li class=""><a href="#"><b>Mangalagiri silk & cotton</b></a></li>
                        </ul>
					</div>
				</div>

				<!-- Mobile Navigation End Here -->


			</div>
		</div>

		<!--=======  End of header bottom  =======-->
	</header>

	<!--===== End of Header wide topbar ======-->