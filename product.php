<?php include "dbconn.php" ?>
<?php include('header.php'); ?>
<?php 
	$correl_id = $_GET['id'];
	$sql="SELECT * FROM products WHERE correl_id='$correl_id'";
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_array($result)){
		$product_id=$row['product_id'];
		$corl_id = $row['correl_id'];
		$product_name=$row['product_name'];
		$material=$row['material'];
		$length = $row['length_of_saree'];
		$wash_instructions = $row['wash_instructions'];
		$product_code = $row['product_code'];
		$val = $_SESSION['cur_val'];
		$cur = $_SESSION['cur_type'];
		$price= $val * $row['price'];
		$discount_price=$row['discount_price'];
		$available_stock=$row['available_stcok'];
		$category_name=$row['category_name'];
		if($category_name){
			$cat_sql = "SELECT * FROM categories WHERE category_name='$category_name'";
			$cat_res = mysqli_query($conn,$cat_sql);
			while($cr = mysqli_fetch_array($cat_res)){
				$category_id = $cr['category_id'];
			}
		}
		$main_price=$price-$discount_price;
		$next = "SELECT * FROM products WHERE product_id=(select min(product_id) from products where product_id > $product_id)";
		$nextres = mysqli_query($conn,$next);
		while($nr = mysqli_fetch_array($nextres)){
			$next_prod = $nr['correl_id'];
		}
		$prev = "SELECT * FROM products WHERE product_id=(select max(product_id) from products where product_id < $product_id)";
		$prevres = mysqli_query($conn,$prev);
		while($pr = mysqli_fetch_array($prevres)){
			$prev_prod = $pr['correl_id'];
		}
	}
?>

	<!--=======  breadcrumb area =======-->

	<div class="breadcrumb-area pt-15 pb-15" style="border-bottom: 1px solid #d8d8d8;">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-8 text-left">
					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="index">HOME</a></li>
						<li class="breadcrumb-list__item" style="text-transform: uppercase;"><a href="products.php?id=<?php echo "$category_id"; ?>"><?php echo "$category_name"; ?></a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active"><?php echo "$product_name"; ?></li>
					</ul>

				</div>
				<div class="col-lg-4 col-md-4 col-4 text-right">
					<!--=======  shop product navigation  =======-->

					<div class="">
						<?php 
							if($prev_prod){
								echo "<a href='product.php?id=$prev_prod' style='color: black;'><i class='ion-ios-arrow-left' style='vertical-align: middle;'></i> Prev |</a>";
							}
							if($next_prod){
								echo "<a href='product.php?id=$next_prod' class='ml-5' style='color: black;'>Next <i class='ion-ios-arrow-right' style='vertical-align: middle;'></i></a>";
							}
						?>
                    </div>

					<!--=======  End of shop product navigation  =======-->

				</div>
			</div>
		</div>
	</div>

	<!--=======  End of breadcrumb area =======-->

	<!--=============================================
    =            shop page content         =
    =============================================-->

	<div class="shop-page-wrapper mt-30 mb-40">
		<div class="container wide">
			<div class="row">
			    <div class="col-lg-12">
					<!--=======  shop product content  =======-->
					
					<div class="shop-product">
						<div class="row pb-100 pb-md-0 pb-sm-0 pb-xs-0 pb-xxs-0">
							<div class="col-xl-6 col-lg-6 mb-md-30 mb-sm-30">
								<div class="row">
									<div class="col-md-3 order-2 order-md-1">
										<!--=======  shop product small image gallery  =======-->
										<div class="shop-product__small-image-gallery-wrapper">
										    <div class="shop-product__small-image-gallery-slider--vertical">
											    <?php
													$correl_id=$_GET['id'];
													$query = "SELECT * FROM product_images WHERE correl_id='$correl_id'";
													$result=mysqli_query($conn,$query);
													while($row=mysqli_fetch_assoc($result)){
														$product_image=$row['product_image'];
												?>
												<!--=======  single image  =======-->
												<div class="single-image">
													<img src="/admin/uploads/<?php echo $product_image; ?>" width="170px" height="225px" class="img-fluid" alt="">
												</div>
												<?php 	
													} 
												?>
											</div>
										</div>
										<!--=======  End of shop product small image gallery  =======-->
									</div>
								

									<div class="col-md-9 order-1 order-sm-1">
										<!--=======  shop product big image gallery  =======-->
										<div class="shop-product__big-image-gallery-wrapper mb-0 mb-sm-30">
											<!--=======  shop product gallery icons  =======-->
											<!-- <div class="single-product__floating-badges single-product__floating-badges--shop-product">
												<span class="hot">hot</span>
											</div> -->

											<div class="shop-product-rightside-icons">
												<span class="enlarge-icon">
													<a class="btn-zoom-popup" href="#" data-tippy="Click to enlarge" data-tippy-placement="left"
														data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50"
														data-tippy-arrow="true" data-tippy-theme="sharpborder"><i
															class="ion-android-expand"></i></a>
												</span>
											</div>

											<!--=======  End of shop product gallery icons  =======-->
											<div class="shop-product__big-image-gallery-slider">
												<!--=======  single image  =======-->
												<?php
													$correl_id=$_GET['id'];
													$query = "SELECT * FROM product_images WHERE correl_id='$correl_id'";
													$result=mysqli_query($conn,$query);
													while($row=mysqli_fetch_assoc($result)){
														$product_image=$row['product_image'];
													?>

													<div class="single-image">
														<img src="/admin/uploads/<?php echo $product_image; ?>" height="1080px" width="810px" class="img-fluid" alt="">
													</div>
													<?php } 
												?>
												<!--=======  End of single image  =======-->
											</div>
										</div>
										<!--=======  End of shop product big image gallery  =======-->
									</div>
								</div>
							</div>

							<div class="col-xl-5 col-lg-5 mb-md-70 mb-sm-70">
								<!--=======  shop product description  =======-->

								<div class="shop-product__description">
									
									<!--=======  shop product title  =======-->

									<div class="shop-product__title mb-15">
										<h2><?php echo $product_name; ?></h2>
									</div>

									<!--=======  End of shop product title  =======-->

									<!--=======  shop product price  =======-->

									<div class="shop-product__price mb-15">
                                    <div class="shop-product__short-desc"> Product Code:
                                       <span class="shop-product__short-desc"><?php echo $product_code; ?></span></div>
									</div>

									<!--=======  End of shop product price  =======-->

                                    
                                    <div class="shop-product__price mb-15">
										<span class="main-price"><?php echo $cur ?> <?php echo $price ?></span>
									</div>

									<!--=======  shop product quantity block  =======-->

									<div class="shop-product__short-desc">
										<span class="shop-product__short-desc">Product Description</span>
										<hr>
									</div>

									<div class="shop-product__block shop-product__block--quantity mb-10">
										<div class="shop-product__block__title" style="flex-basis: 40%;">Material: </div>
										<div class="shop-product__block__value">
                                            <span class="discounted-price"><?php echo $material; ?></span> 
										</div>
									</div>

									<div class="shop-product__block shop-product__block--quantity mb-10">
										<div class="shop-product__block__title" style="flex-basis: 40%;">Length: </div>
										<div class="shop-product__block__value">
                                            <span class="discounted-price"><?php echo $length; ?></span> 
										</div>
									</div>

									<div class="shop-product__block shop-product__block--quantity mb-10">
										<div class="shop-product__block__title" style="flex-basis: 40%;">Wash Instructions: </div>
										<div class="shop-product__block__value">
                                            <span class="discounted-price"><?php echo $wash_instructions; ?></span> 
										</div>
									</div>

									<div class="shop-product__block shop-product__block--quantity mb-10">
										<div class="shop-product__block__title" style="flex-basis: 40%;">Stock: </div>
										<div class="shop-product__block__value">
                                            <span class="discounted-price"><?php echo $available_stock; ?></span> 
										</div>
									</div>

									<!--=======  End of shop product quantity block  =======-->

									<!--=======  shop product buttons  =======-->

									<div class="shop-product__buttons mb-40">
									    <a class="lezada-button lezada-button--medium add-to-cart" href="javascript:void(0)" data-id="<?php echo $product_id ?>">Add To Cart</a>
										<a class="lezada-button lezada-button--medium buy-now" href="javascript:void(0)" data-id="<?php echo $product_id ?>">BUY NOW</a>
									</div>

									<!--=======  End of shop product buttons  =======-->

									
									<!--=======  other info table  =======-->

									<div class="quick-view-other-info pb-0">
										<table>
											<tr class="single-info">
												<td class="quickview-title">Share on: </td>
												<td class="quickview-value">
													<ul class="quickview-social-icons">
														<li><a href="#"><i class="fa fa-facebook"></i></a></li>
														<li><a href="#"><i class="fa fa-twitter"></i></a></li>
														<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
														<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
													</ul>
												</td>
											</tr>
										</table>
									</div>

									<!--=======  End of other info table  =======-->
								</div>

								<!--=======  End of shop product description  =======-->
							</div>
						
						</div>
					
						<h3 class="shop-product__title mb-35">Related Products</h3>
                      
                        <div class="row">
                        <?php 
                        $correl_id=$_GET['id'];
                        // echo $correl_id;
                            // $sql="SELECT * FROM products WHERE correl_id='$correl_id'";
                            // $res=$conn->query($sql);
                            // while($r=fetch_array($res)){
                            //     $correl_id=$r['correl_id'];
                            //     $category_name=$r['category_name'];
                            // }


                                $sql2="SELECT * FROM products WHERE category_name='$category_name' AND correl_id!='$correl_id'";
                                $prodres=$conn->query($sql2);
                                if($prodres->num_rows>0)
                                {
                                    while($row=fetch_array($prodres))
                                    {
										$product_id=$row['product_id'];
                                        $cat_name=$row['category_name'];
                                        $correl=$row['correl_id'];
                                        $product_name=$row['product_name'];
                                        $product_id=$row['product_id'];
                                        $val = $_SESSION['cur_val'];
										$cur = $_SESSION['cur_type'];
										$price= $val * $row['price'];
                                        $discount_price=$row['discount_price']; 
                                        $main_price=$price-$discount_price;
       
                        ?>
                            <!--=======  single product  =======-->
                            <div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45">
                                <div class="single-product">
                                    <!--=======  single product image  =======-->
                                     <?php 
                                     $sqlimg="SELECT * FROM product_images WHERE correl_id='$correl'";
                                     $imgres=$conn->query($sqlimg);
                                    //  echo $sqlimg;
                                     while($row=fetch_array($imgres))
                                     {
                                         $cor_id=$row['correl_id'];
                                         $image=$row['product_image'];
                                     }
                                     ?>

                                    <div class="single-product__image">
                                        <a class="image-wrap" href="product.php?id=<?php echo $cor_id; ?>">
                                            <img src="/admin/uploads/<?php echo $image; ?>" class="img-fluid" alt="">
                                        </a>
									</div>

                                    <!--=======  End of single product image  =======-->
                                   

                                    <!--=======  single product content  =======-->

                                    <div class="single-product__content">
                                        <div class="title">
                                            <h3> <a href="product.php?id=<?php echo $cor_id; ?>"> <?php echo $cat_name; ?></a></h3>
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
                            <?php }
                        }else{
                            ?>
                            <div class="col-md-12 text-center">
                                <div class="alert alert-warning">No Products Found</div>
                            </div>
                          
                            <?php
                        }
                         ?>

                        </div>
                        
					</div>
					

					<!--=======  End of shop product content  =======-->
					
				</div>
				

			</div>
		</div>
	</div>

	<!--=====  End of shop page content  ======-->

<?php include('footer.php'); ?>