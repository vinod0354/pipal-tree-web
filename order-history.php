<?php include "dbconn.php" ?>
<?php include('header.php'); ?>
<?php
	session_start();
	if (!isset($_SESSION['usernow'])) {
		redirect('login.php');
		exit(0);
	} else {

	} 
?>

	<!--=======  breadcrumb area =======-->

	<div class="breadcrumb-area pt-15 pb-15" style="border-bottom: 1px solid #d8d8d8;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-left">
					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="index.php">HOME</a></li>
						<li class="breadcrumb-list__item"><a href="products.php">PRODUCTS</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">ORDER HISTORY</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

    <!--=======  End of breadcrumb area =======-->
    
    <?php 
    $sql_login="SELECT * FROM cust_login_master where `email_id`='{$_SESSION['usernow']}'";
    $query_login=$conn->query($sql_login);
		if($query_login->num_rows>0)
		{
			while($row=fetch_array($query_login))
			{
				$id=$row['id'];
				
			}
		}
	?>

	<!--=============================================
	=            cart page content         =
	=============================================-->

	<div class="shopping-cart-area mt-40 mb-40">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-30">
					<!--=======  cart table  =======-->

					<div class="cart-table-container">
						<table class="cart-table">
							<thead>
								<tr>
									<th class="product-name" colspan="2">Product</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
								</tr>
							</thead>

							<tbody>
                                <?php 
                                    $order_history_sql="SELECT * FROM orders_history WHERE customer_id='$id' AND `status`='Success'";
                                    $order_history_res=$conn->query($order_history_sql);
                                    if($order_history_res->num_rows>0)
                                    {
                                        while($row=fetch_array($order_history_res))
                                        {
                                            $product_id=$row['product_id'];
                                            $quantity=$row['quantity'];
                                            $val = $_SESSION['cur_val'];
											$cur = $_SESSION['cur_type'];
											$price= $val * $row['price'];
                                            $product_sql="SELECT * FROM products WHERE product_id='$product_id'";
                                            $product_res=$conn->query($product_sql);
                                            if($product_res->num_rows>0)
                                            {
                                                while($row=fetch_array($product_res))
                                                {
                                                    $product_name=$row['product_name'];
                                                    $correl_id=$row['correl_id'];

                                                }
                                            }
                                            
                                            $prod_img_sql="SELECT * FROM product_images WHERE correl_id='$correl_id' AND product_image LIKE '%main_%'";
                                            $prod_img_res=$conn->query($prod_img_sql);
                                            // echo $prod_img_sql;
                                            if($prod_img_res->num_rows>0)
                                            {
                                                while($row=fetch_array($prod_img_res))
                                                {
                                                    $product_image=$row['product_image'];
                                                    
                                                }
                                            }
								?>
								<tr>
									<td class="product-thumbnail">
										<a href="#">
											<img src="/admin/uploads/<?php echo $product_image ?>" class="img-fluid" alt="">
										</a>
									</td>
									<td class="product-name">
										<a href="#"><?php echo $product_name; ?></a>
									</td>

									<td class="product-price"><span class="price"><?php echo $price; ?> <?php echo $cur; ?></span></td>

									<td class="product-quantity">	
										<span class='price'><?php echo $quantity; ?></span>
									</td>
                                </tr>
                                <?php
                                     }
                                    }?>
							</tbody>
						</table>
					</div>

					<!--=======  End of cart table  =======-->
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of cart page content  ======-->

<?php include('footer.php'); ?>