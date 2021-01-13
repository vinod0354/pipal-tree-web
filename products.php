<?php include "dbconn.php" ?>
<?php include('header.php'); ?>


	<!--=============================================
    =            shop page content         =
    =============================================-->

	<div class="shop-page-wrapper">

		<!--=======  shop page header  =======-->

		<div class="shop-page-header pt-5 pb-10">
			<div class="container">
				<div class="row align-items-center">
					<?php 
						if($category_id = $_GET['id']){
							$sql = "SELECT * FROM categories WHERE category_id='$category_id'";
							$query=$conn->query($sql);
							while($row=fetch_array($query)){
								$category_name=$row['category_name'];
							}
						}
					?>

					<div class="col-12 col-lg-7 col-md-10">
						<ul class="breadcrumb-list">
							<li class="breadcrumb-list__item"><a href="index">HOME</a></li>
							<li class="breadcrumb-list__item breadcrumb-list__item--active">
								<?php 
									if($category_name){
										echo "$category_name";
									}else{
										echo "Products";
									}
								?>
							</li>
						</ul>
					</div>

					<div class="col-lg-5 col-md-2 d-none d-lg-block d-md-block">
						<!--=======  filter icons  =======-->

						<div class="filter-icons">
							<!--=======  filter dropdown  =======-->

							<div class="single-icon filter-dropdown">
								<form action="" method="POST">
									<select name="sort" class="nice-select" onchange="this.form.submit()">
										<option value="">Default sorting</option>
										<option value='ASC'>Sort by price: low to high</option>
										<option value='DESC'>Sort by price: high to low</option>
									</select>
								</form>
							</div>

							<!--=======  End of filter dropdown  =======-->

							<!--=======  grid icons  =======-->

							<div class="single-icon grid-icons">
								<a data-target="five-column" href="javascript:void(0)" class="active"><i class="ti-layout-grid4-alt"></i></a>
								<a data-target="list" href="javascript:void(0)"><i class="ti-view-list"></i></a>
							</div>

							<!--=======  End of grid icons  =======-->

						</div>

						<!--=======  End of filter icons  =======-->
					</div>

				</div>
			</div>
		</div>

		<!--=======  End of shop page header  =======-->

		<!--=============================================
		=            shop page content         =
		=============================================-->

		<div class="shop-page-content mt-40 mb-40">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 order-2 order-lg-1">
						<!--=======  page sidebar  =======-->

						<div class="page-sidebar">
							<!--=======  single sidebar widget  =======-->
							<div class="single-sidebar-widget mb-40">
								<!--=======  search widget  =======-->

								<div class="search-widget">
									<form action="products.php" method="post" id="filters_form">
										<input type="text" name="term" placeholder="Search products ...">
										<button type="submit" name="submit"><i class="ion-android-search"></i></button>
									</form>
								</div>

								<!--=======  End of search widget  =======-->
							</div>


							<!--=======  End of single sidebarwidget  =======-->

							<!--=======  single sidebar widget  =======-->

							<div class="single-sidebar-widget mb-40">
								<h2 class="single-sidebar-widget--title">Categories</h2>
								<ul class="single-sidebar-widget--list single-sidebar-widget--list--category">
									
									<?php 
										

										$sql="SELECT category_name,SUM(available_stcok) as total FROM products GROUP BY category_name";
										$catres=$conn->query($sql);
										if($catres->num_rows>0)
										{
											while($row=fetch_array($catres))
											{
												$category_name=$row['category_name'];
												$stock=$row['total'];
												$cat = "SELECT * FROM categories WHERE category_name='$category_name'";
												$query = $conn->query($cat);
												if($query->num_rows>0){
													while($row=fetch_array(($query))){
														$category_id=$row['category_id'];
													}
												}
									?>
                                    <li><a href="products.php?id=<?php echo $category_id; ?>"><?php echo $category_name; ?> </a> <span class="quantity"><?php echo $stock ?></span></li>
                                    <?php 
                                            }
                                        }
                                     ?>
									
								</ul>
							</div>

							<!--=======  End of single sidebar widget  =======-->


							<!--=======  single sidebar widget  =======-->

							<div class="single-sidebar-widget mb-40">
								<h2 class="single-sidebar-widget--title">Filters</h2>
								<div class="sidebar-price">
									<div id="price-range"></div>
									<form action="" method="POST">
										<input type="text" id="price-amount" class="price-amount" readonly>
										<input type="hidden" name="min" id="min_price" value="<?php echo $min_price; ?>" class="price-amount">
										<input type="hidden" name="max" id="max_price" value="<?php echo $max_price; ?>" class="price-amount">
										<button class="price-range-button" type="submit" name="range" style="background: none; border: none;">
											<i class="ion-android-funnel"></i> Filter
										</button>
									</form>
								</div>
							</div>

							<!--=======  End of single sidebar widget  =======-->

							<!--=======  single sidebar widget  =======-->

							<div class="single-sidebar-widget mb-40">
								<h2 class="single-sidebar-widget--title">Popular products</h2>

								<!--=======  widget product wrapper  =======-->

								<div class="widget-product-wrapper">
									<!--=======  single widget product  =======-->
									<?php 
										$sql="SELECT * FROM products WHERE is_popular='yes' LIMIT 3";
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
												$price= $val * $row['price']; 
									?>

									<div class="single-widget-product-wrapper">
										<div class="single-widget-product">
											<!--=======  image  =======-->
											<?php 
												$sql="SELECT * FROM product_images WHERE correl_id='$correl_id' AND product_image LIKE '%main_%'";
												$query=$conn->query($sql);
												while($row=fetch_array($query)){
													$product_image=$row['product_image'];
												}
											?>

											<div class="single-widget-product__image">
												<a href="product.php?id=<?php echo $correl_id; ?>">
													<img src="/admin/uploads/<?php echo $product_image ?>" class="img-fluid" alt="" style="height:100px;width:auto;">
												</a>
											</div>
										

											<!--=======  End of image  =======-->

											<!--=======  content  =======-->

											<div class="single-widget-product__content">

												<div class="single-widget-product__content__top">
													<h3 class="product-title"><a href="product.php?id=<?php echo $correl_id; ?>"><?php echo $product_name; ?></a></h3>
													<div class="price">
														<span class="main-price"><?php echo $cur ?> <?php echo $price ?></span>
													</div>
												</div>

											</div>

											<!--=======  End of content  =======-->
										</div>
									</div>
									<?php } } ?>

									<!--=======  End of single widget product  =======-->

								</div>

								<!--=======  End of widget product wrapper  =======-->
							</div>

							<!--=======  End of single sidebar widget  =======-->

						</div>

						<!--=======  End of page sidebar  =======-->
					</div>
					<div class="col-lg-9 order-1 order-lg-2 mb-md-80 mb-sm-80">

						<div class="row product-isotope shop-product-wrap four-column">

                            <!--=======  single product  =======-->
							<?php 
								if($category_id = $_GET['id']){
									$sql = "SELECT * FROM categories WHERE category_id='$category_id'";
									$query=$conn->query($sql);
									while($row=fetch_array($query)){
										$category_name=$row['category_name'];
									}
									if($category_name){
										$sql="SELECT * FROM products WHERE category_name='$category_name'";
										if(isset($_POST["sort"])){
											$sort = $_POST["sort"];
											$sql = "SELECT * FROM products WHERE category_name='$category_name' ORDER BY price $sort";
										}
									}
								}else if(isset($_POST["submit"])){
									$str = $_POST["term"];
									$sql="SELECT * FROM products WHERE product_name LIKE '%$str%'";
								}else if(isset($_POST["range"])){
									$val1 = $_POST["min"];
									$val2 = $_POST["max"];
									$sql="SELECT * FROM products WHERE  price BETWEEN $val1 and $val2";
								}else if(isset($_POST["sort"])){
									$sort = $_POST["sort"];
									if(!$sort){
										$sql="SELECT * FROM products";
									}else{
										$sql = "SELECT * FROM products ORDER BY price $sort";
									}
								}else{
									$sql="SELECT * FROM products";
								}
                                
                                $prodres=$conn->query($sql);
                                if($prodres->num_rows>0)
                                {
                                    while($row=fetch_array($prodres))
                                    {
										$correl_id=$row['correl_id'];
										$product_id=$row['product_id'];
                                        $product_name=$row['product_name'];
                                        $val = $_SESSION['cur_val'];
										$cur = $_SESSION['cur_type'];
										$price= $val * $row['price'];
										$discount_price=$row['discount_price'];
										$main_price=$price-$discount_price;
                            ?>
							<div class="col-12 col-lg-3 col-md-6 col-sm-6 mb-45 hot sale">
                              
								<div class="single-product">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
                                        <a class="image-wrap" href="product.php?id=<?php echo $correl_id; ?>">
                                             <?php 
                                               $sql="SELECT * FROM product_images WHERE correl_id='$correl_id' AND product_image LIKE '%main_%'";
                                               $query=$conn->query($sql);
												while($row=fetch_array($query)){
													$product_image=$row['product_image'];
												}
											?>
											<img src="/admin/uploads/<?php echo $product_image ?>" class="img-fluid" alt="">
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
                                
								<div class="single-product--list">
									<!--=======  single product image  =======-->

									<div class="single-product__image">
										<a class="image-wrap" href="product.php?id=<?php echo $correl_id; ?>">
											<img src="/admin/uploads/<?php echo $product_image ?>" class="img-fluid" alt="">
										</a>
									</div>

									<!--=======  End of single product image  =======-->

									<!--=======  single product content  =======-->

									<div class="single-product__content">
										<div class="title">
											<h3> <a href="product.php?id=<?php echo $correl_id; ?>"><?php echo $product_name; ?></a></h3>
										</div>
										<div class="price">
											<span class="main-price"><?php echo $cur ?> <?php echo $price ?></span>
										</div>
										<a class="lezada-button lezada-button--medium add-to-cart add-to-cart" href="javascript:void(0)" data-id="<?php echo $product_id ?>">ADD TO CART</a>
									</div>

									<!--=======  End of single product content  =======-->
								</div>
                            </div>
                            <?php 
									}
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
				</div>
			</div>
		</div>

		<!--=====  End of shop page content  ======-->
	</div>

	<!--=====  End of shop page content  ======-->

<?php include('footer.php'); ?>