<?php include "dbconn.php" ?>
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

	<!-- Modernizer JS -->
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>

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


	<!--=============================================
	=            slider area         =
	=============================================-->

	<div class="slider-area mb-95 mb-md-75  mb-sm-75">
		<div id="rev_slider_17_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="homepage-7"
			data-source="gallery"
			style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
			<!-- START REVOLUTION SLIDER 5.4.7 fullwidth mode -->
			<div id="rev_slider_17_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
				<ul>
                <?php 
                    $sql="SELECT * FROM slider";
					$sres=$conn->query($sql);
                    if($sres->num_rows>0)
                    {
                        while($row=fetch_array($sres))
                        {
                            $slider_id=$row['slider_id'];
                            $slider_image=$row['slider_image'];
							$slider_heading=$row['slider_heading'];
                            $slider_sub=$row['slider_sub_heading']; 
					?>
					<!-- SLIDE  -->
					<li data-index="rs-45<?php echo $slider_id; ?>"
						data-transition="parallaxtoright,parallaxtoleft,parallaxtotop,parallaxtobottom,parallaxhorizontal,parallaxvertical,fadefromright,fadefromleft,fadefromtop,fadefrombottom"
						data-slotamount="default,default,default,default,default,default,default,default,default,default"
						data-hideafterloop="0" data-hideslideonmobile="off"
						data-easein="default,default,default,default,default,default,default,default,default,default"
						data-easeout="default,default,default,default,default,default,default,default,default,default"
						data-masterspeed="700,default,default,default,default,default,default,default,default,default"
						data-thumb="/admin/uploads/<?php echo $slider_image ?>"
						data-rotate="0,0,0,0,0,0,0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1=""
						data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
						data-param9="" data-param10="" data-description="">
						<!-- MAIN IMAGE -->
						<img src="admin/images/revimages/dummy.png" alt=""
							data-lazyload="/admin/uploads/<?php echo $slider_image ?>"
							data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone"
							data-scalestart="100" data-scaleend="110" data-rotatestart="0" data-rotateend="0" data-blurstart="0"
							data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="off" class="rev-slidebg"
							data-no-retina>
						<!-- LAYERS -->

						<!-- LAYER NR. 1 -->
						<div class="tp-caption   tp-resizeme" id="slide-45<?php echo $slider_id; ?>-layer-13" data-x="['left','center','left','left']"
							data-hoffset="['375','-342','65','38']" data-y="['middle','top','top','top']"
							data-voffset="['-79','194','612','460']" data-fontsize="['24','24','24','20']"
							data-color="['rgb(0,0,0)','rgb(0,0,0)','rgb(0,0,0)','rgb(0,0,0)']" data-width="none"
							data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
							data-frames='[{"delay":1100,"speed":1790,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
							data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
							data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
							style="z-index: 5; white-space: nowrap; font-size: 24px; line-height: 36px; font-weight: 600; color: #000; letter-spacing: 5px;font-family:Work Sans;">
							<?php echo $slider_sub; ?> </div>

						<!-- LAYER NR. 2 -->
						<div class="tp-caption   tp-resizeme" id="slide-45<?php echo $slider_id; ?>-layer-3" data-x="['left','center','center','left']"
							data-hoffset="['372','-224','-111','36']" data-y="['top','middle','middle','top']"
							data-voffset="['314','-103','215','508']" data-fontsize="['56','56','56','40']"
							data-lineheight="['56','60','60','60']" data-width="none" data-height="none" data-whitespace="nowrap"
							data-type="text" data-responsive_offset="on"
							data-frames='[{"delay":680,"speed":1750,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power2.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
							data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
							data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
							style="z-index: 6; white-space: nowrap; font-size: 56px; line-height: 56px; font-weight: 300; color: #000; letter-spacing: 0px;font-family:Work Sans;">
							<?php echo $slider_heading; ?></div>

						<!-- LAYER NR. 3 -->
						<div class="tp-caption button-under-line rev-btn  tp-resizeme" id="slide-45<?php echo $slider_id; ?>-layer-20"
							data-x="['left','center','center','left']" data-hoffset="['372','-369','-246','39']"
							data-y="['top','top','top','top']" data-voffset="['416','362','781','607']" data-width="none"
							data-height="none" data-whitespace="nowrap" data-type="button" data-actions='' data-responsive_offset="on"
							data-frames='[{"delay":1100,"speed":1790,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(211,18,42);bc:rgb(211,18,42);"}]'
							data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]"
							data-paddingright="[0,0,0,0]" data-paddingbottom="[3,3,3,3]" data-paddingleft="[0,0,0,0]"
							style="z-index: 7; white-space: nowrap; letter-spacing: 1px;border-color:rgb(51,51,51);outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">
							<a class="revslider-button-red" href="products.php"> SHOP COLLECTION</a> </div>
                    </li>
                    <?php   
                    	}
                    }
					?>
                    <!-- SLIDE  -->
                </ul>
				<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
			</div>
		</div><!-- END REVOLUTION SLIDER -->
	</div>

	<!--=====  End of slider area  ======-->

	<!--=============================================
	=            product category container two         =
    =============================================-->


	<div class="product-category-container mb-90 mb-md-70 mb-sm-55">
		<div class="container wide">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  product category wrapper  =======-->

					<div class="lezada-slick-slider product-category-slider" data-slick-setting='{
						"slidesToShow": 3,
						"arrows": true,
						"autoplay": true,
						"autoplaySpeed": 5000,
						"speed": 1000,
						"prevArrow": {"buttonClass": "slick-prev", "iconClass": "ion-ios-arrow-thin-left" },
						"nextArrow": {"buttonClass": "slick-next", "iconClass": "ion-ios-arrow-thin-right" }
					}' data-slick-responsive='[
						{"breakpoint":1501, "settings": {"slidesToShow": 3} },
						{"breakpoint":1199, "settings": {"slidesToShow": 3} },
						{"breakpoint":991, "settings": {"slidesToShow": 2, "arrows": false} },
						{"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false} },
						{"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false} },
						{"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false} }
					]'>
                    <?php 
                        $sql= "SELECT * FROM categories";
                        $catresult=$conn->query($sql);
                        if($catresult->num_rows>0)
                        {
                            while($row=fetch_array($catresult))
                            {
                                $cat_img=$row['image'];
                                $category_name=$row['category_name'];
                                $category_id=$row['category_id'];
					?>
						<div class="col">
                            <!--=======  single category  =======-->
                            

							<div class="single-category single-category--two">
                                <!--=======  single category image  =======-->
                             

								<div class="single-category__image single-category__image--two">
                                    <img src="/admin/uploads/<?php echo $cat_img; ?>" class="img-fluid" alt="">
                                </div>
								

                                <!--=======  End of single category image  =======-->
                                <?php 
									$sql="SELECT SUM(available_stcok) as total FROM products WHERE category_name='$category_name'";
									$catres=$conn->query($sql);
									if($catres->num_rows>0)
									{
										while($row=fetch_array($catres))
										{
											$stock=$row['total'];
										}
									}
                                ?>

								<!--=======  single category content  =======-->

								<div class="single-category__content single-category__content--two mt-25">
									<div class="title">
										<a href="products.php?id=<?php echo $category_id; ?>"><?php echo  $category_name; ?></a>
									</div>
									<p class="product-count"><?php echo $stock; ?></p>
								</div>

								<!--=======  End of single category content  =======-->


								<!--=======  banner-link  =======-->

								<a href="products.php?id=<?php echo $category_id; ?>" class="banner-link"></a>

								<!--=======  End of banner-link  =======-->
							</div>

							<!--=======  End of single category  =======-->
                        </div>
                        <?php } } ?>
					</div>

					<!--=======  End of product category wrapper  =======-->
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of product category container two  ======-->

	<!--=============================================
    =            countdown timer area         =
    =============================================-->
    <?php 
		$sql="SELECT * FROM deal_of_day";
		$res=$conn->query($sql);
		if($res->num_rows>0)
		{
			while($row=fetch_array($res))
			{
				$deal_image=$row['deal_image'];
				$deal_heading=$row['deal_heading'];
				$deal_timer=$row['deal_timer'];
			}
		}
    ?>

	<div class="countdown-timer-area mb-90 mb-md-70 mb-sm-70 countdown-background pt-100 pb-100" style="background-image:url('/admin/uploads/<?php echo $deal_image; ?>')">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class=" col-12 col-xl-7 offset-xl-5 col-lg-8 offset-lg-4">
							<div class="countdown-wrapper text-center">
								<h3><?php echo $deal_heading; ?></h3>
                                <!-- <div class="deal-countdown" data-countdown="2020/12/01"></div> -->
                                <div class="deal-countdown" id="demo"></div>
								<a href="#" class="lezada-button lezada-button--medium lezada-button--icon--left">
									browse all</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!--=====  End of countdown timer area  ======-->
    
    <!--=============================================
	=            section title  container      =
	=============================================-->

	<div class="section-title-container mb-70 mb-md-50 mb-sm-50">
		<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<!--=======  section title  =======-->

			<div class="section-title section-title--one text-center">
				<h3>Featured Sarees</h3>
			</div>

			<!--=======  End of section title  =======-->
			</div>
		</div>
		</div>
	</div>

	<!--=====  End of section title container ======-->

	<!--=============================================
		=            product carousel container         =
		=============================================-->

	<div class="product-carousel-container product-carousel-container--smarthome mb-35 mb-md-0 mb-sm-0">
		<div class="row">
			<div class="col-lg-12">
				<!--=======  product carousel  =======-->
				<div class="lezada-slick-slider product-carousel product-carousel--smarthome" data-slick-setting='{
							"slidesToShow": 5,
							"slidesToScroll": 5,
							"arrows": false,
							"dots": true,
							"autoplay": false,
							"autoplaySpeed": 5000,
							"speed": 1000,
							"prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
							"nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
						}' data-slick-responsive='[
							{"breakpoint":1501, "settings": {"slidesToShow": 5, "arrows": false} },
							{"breakpoint":1199, "settings": {"slidesToShow": 4, "arrows": false} },
							{"breakpoint":991, "settings": {"slidesToShow": 3,"slidesToScroll": 3, "arrows": false} },
							{"breakpoint":767, "settings": {"slidesToShow": 2, "slidesToScroll": 2, "arrows": false} },
							{"breakpoint":575, "settings": {"slidesToShow": 2, "slidesToScroll": 2,  "arrows": false} },
							{"breakpoint":479, "settings": {"slidesToShow": 1, "slidesToScroll": 1, "arrows": false} }
						]'>

				<!--=======  single product  =======-->
				<?php 
						$sql="SELECT * FROM products WHERE is_featured='yes'";
						$prodres=$conn->query($sql);
						if($prodres->num_rows>0)
						{
							while($row=fetch_array($prodres))
							{
								$correl_id=$row['correl_id'];
								$product_name=$row['product_name'];
								$val = $_SESSION['cur_val'];
								$cur = $_SESSION['cur_type'];
								$price = $val * $row['price'];
								$product_id=$row['product_id'];
								$discount_price=$row['discount_price'];       
					?>
					<div class="col">
						<div class="single-product">
						<!--=======  single product image  =======-->
						<?php 
							$sql="SELECT * FROM product_images WHERE correl_id='$correl_id' AND product_image LIKE '%main_%'";
							$query=$conn->query($sql);
							while($row=fetch_array($query)){
								$product_image=$row['product_image'];
							}
						?>
							<div class="single-product__image">
								<a class="image-wrap" href="product.php?id=<?php echo $correl_id; ?>">
								<img src="/admin/uploads/<?php echo $product_image ?>" width="600px" height="800px" class="img-fluid" alt="">
								</a>
							</div>

							<!--=======  End of single product image  =======-->

							<!--=======  single product content  =======-->

							<div class="single-product__content">
								<div class="title">
									<h3> <a href="product.php?id=<?php echo $correl_id; ?>"><?php echo $product_name; ?></a></h3>
									<a class="add-to-cart" href="javascript:void(0)" data-id="<?php echo $product_id ?>">Add to cart</a>
								</div>
									<div class="price">
									<span class="main-price"><?php echo $cur ?> <?php echo $price ?></span>
								</div>
							</div>

							<!--=======  End of single product content  =======-->
						</div>
					</div>
					<!--=======  End of single product  =======-->
					<?php }} 
					?>
				</div>
				<!--=======  End of product carousel  =======-->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 text-center mt-25 mb-25">
			<a href="products" class="lezada-button lezada-button--small">
				view more</a>
			</div>
		</div>
	</div>

	<!--=====  End of product carousel container  ======-->

	<!--=============================================
	=            cosmetics home intro section         =
    =============================================-->
    <?php 
		$sql="SELECT * FROM saree_colle_1";
		$res=$conn->query($sql);
		if($res->num_rows>0)
		{
			while($row=fetch_array($res))
			{
				$heading=$row['heading'];
				$sub=$row['sub_heading'];
				$desc=$row['description'];
				$image=$row['image'];

	?>

	<div class="cosmetics-home-intro-area mb-70">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 mb-30">
					<div class="cosmetics-home-intro">
						<p class="label"><?php echo $sub; ?></p>
						<h3 class="title"><?php echo $heading; ?></h3>
						<p class="description"><?php echo $desc; ?></p>
						<a href="#" class="lezada-shop-link">LEARN MORE</a>

					</div>
				</div>

				<div class="col-md-6 mb-30">
					<!--=======  single image  =======-->

					<div class="single-banner-image text-center text-md-right">
						<img src="/admin/uploads/<?php echo $image; ?>" class="img-fluid" alt="">
					</div>

					<!--=======  End of single image  =======-->
				</div>
			</div>
		</div>
    </div>
    <?php         
    }
    }?>

	<?php 
    $sql="SELECT * FROM saree_sec_2";
    $res=$conn->query($sql);
    if($res->num_rows>0)
    {
        while($row=fetch_array($res))
        {
            $sec_heading=$row['sec_heading'];
            $sec_sub=$row['sec_sub_heading'];
            $sec_desc=$row['sec_descr'];
            $sec_image=$row['image'];

	?>
    <div class="cosmetics-home-intro-area mb-70">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 mb-30">
					<!--=======  single image  =======-->

					<div class="single-banner-image text-center text-md-right">
						<img src="/admin/uploads/<?php echo $sec_image; ?>" class="img-fluid" alt="">
					</div>

					<!--=======  End of single image  =======-->
                </div>
                <div class="col-md-6 mb-30">
					<div class="cosmetics-home-intro">
						<p class="label"><?php echo $sec_sub; ?></p>
						<h3 class="title"><?php echo $sec_heading; ?></h3>
						<p class="description"><?php echo $sec_desc; ?></p>
						<a href="#" class="lezada-shop-link">LEARN MORE</a>

					</div>
				</div>
            </div>
		</div>
    </div>
    <?php         
    }
    }
    ?>

    <!--=====  End of cosmetics home intro section  ======-->
    
    <!--=============================================
	=            section title  container      =
	=============================================-->

    <div class="section-title-container mb-70 mb-md-50 mb-sm-50">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <!--=======  section title  =======-->

            <div class="section-title section-title--one text-center">
                <h3>Popular Sarees</h3>
            </div>

            <!--=======  End of section title  =======-->
            </div>
        </div>
        </div>
    </div>

    <!--=====  End of section title container ======-->

    <!--=============================================
        =            product carousel container         =
        =============================================-->

    <div class="product-carousel-container product-carousel-container--smarthome mb-35 mb-md-0 mb-sm-0">
        <div class="row">
        <div class="col-lg-12">
            <!--=======  product carousel  =======-->

            <div class="lezada-slick-slider product-carousel product-carousel--smarthome" data-slick-setting='{
                        "slidesToShow": 5,
                        "slidesToScroll": 5,
                        "arrows": false,
                        "dots": true,
                        "autoplay": false,
                        "autoplaySpeed": 5000,
                        "speed": 1000,
                        "prevArrow": {"buttonClass": "slick-prev", "iconClass": "ti-angle-left" },
                        "nextArrow": {"buttonClass": "slick-next", "iconClass": "ti-angle-right" }
                    }' data-slick-responsive='[
                        {"breakpoint":1501, "settings": {"slidesToShow": 5, "arrows": false} },
                        {"breakpoint":1199, "settings": {"slidesToShow": 4, "arrows": false} },
                        {"breakpoint":991, "settings": {"slidesToShow": 3,"slidesToScroll": 3, "arrows": false} },
                        {"breakpoint":767, "settings": {"slidesToShow": 2, "slidesToScroll": 2, "arrows": false} },
                        {"breakpoint":575, "settings": {"slidesToShow": 2, "slidesToScroll": 2,  "arrows": false} },
                        {"breakpoint":479, "settings": {"slidesToShow": 1, "slidesToScroll": 1, "arrows": false} }
                    ]'>

            <!--=======  single product  =======-->
            <?php 
                $sql="SELECT * FROM products WHERE is_popular='yes'";
                $prodres=$conn->query($sql);
                if($prodres->num_rows>0)
                {
                    while($row=fetch_array($prodres))
                    {
                        $correl_id=$row['correl_id'];
						$product_name=$row['product_name'];
						$product_id=$row['product_id'];
                        $val = $_SESSION['cur_val'];
						$cur = $_SESSION['cur_type'];
						$price = $val * $row['price'];
                        $discount_price=$row['discount_price'];
                        $main_price=$price-$discount_price;       
            ?>
            <div class="col">
                <div class="single-product">
                <!--=======  single product image  =======-->
				<?php 
					$sql="SELECT * FROM product_images WHERE correl_id='$correl_id' AND product_image LIKE '%main_%'";
					$query=$conn->query($sql);
					 while($row=fetch_array($query)){
						 $product_image=$row['product_image'];
					 }
				?>
                <div class="single-product__image">
                    <a class="image-wrap" href="product.php?id=<?php echo $correl_id; ?>">
                    	<img src="/admin/uploads/<?php echo $product_image ?>" width="600px" height="800px" class="img-fluid" alt="">
                    </a>
				</div>

                <!--=======  End of single product image  =======-->

                <!--=======  single product content  =======-->

                <div class="single-product__content">
                    <div class="title">
						<h3><a href="product.php?id=<?php echo $correl_id; ?>"><?php echo $product_name; ?></a></h3>
						<a class="add-to-cart" href="javascript:void(0)" data-id="<?php echo $product_id ?>">Add to cart</a>
                    </div>
                    <div class="price">
						<span class="main-price"><?php echo $cur ?> <?php echo $price ?></span>
                    </div>
                </div>

                <!--=======  End of single product content  =======-->
                </div>
            </div>
            <?php }} ?>
            <!--=======  End of single product  =======-->
            </div>

            <!--=======  End of product carousel  =======-->
        </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center mt-25 mb-25">
            <a href="products" class="lezada-button lezada-button--small">
                view more</a>
            </div>
        </div>
    </div>

    <!--=====  End of product carousel container  ======-->

   
	

	<!--=============================================
	=            section title  container      =
	=============================================-->

	<div class="section-title-container mb-80 mb-md-60 mb-sm-40">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<!--=======  section title  =======-->

					<div class="section-title section-title--one text-center">
						<h1><a href="#">@pipal_tree</a></h1>
						<p class="subtitle subtitle--deep subtitle--trending-home">Follow us on instagram</p>

					</div>

					<!--=======  End of section title  =======-->
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of section title container ======-->

<script type="text/javascript">
	// Set the date we're counting down to
	var countDownDate = new Date("<?php echo $deal_timer ;?>").getTime();

	// Update the count down every 1 second
	var x = setInterval(function() {

	// Get today's date and time
	var now = new Date().getTime();
		
	// Find the distance between now and the count down date
	var distance = countDownDate - now;
		
	// Time calculations for days, hours, minutes and seconds
	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		
	// Output the result in an element with id="demo"
	document.getElementById("demo").innerHTML = " <div class='single-countdown'><span class='single-countdown__time'>"+ days + "</span><span class='single-countdown__text'>Days</span></div> " + "<div class='single-countdown'><span class='single-countdown__time'>" + hours + "</span><span class='single-countdown__text'>Hours</span></div> " 
	+ "<div class='single-countdown'><span class='single-countdown__time'>" + minutes + "</span><span class='single-countdown__text'>Minutes</span></div> " + "<div class='single-countdown'><span class='single-countdown__time'>" + seconds + "</span><span class='single-countdown__text'>Seconds</span></div> ";

		
	// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("demo").innerHTML = "EXPIRED";
		}
	}, 1000);
</script>

<?php include('footer.php'); ?>