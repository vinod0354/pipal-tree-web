<?php include "dbconn.php" ?>
<?php include('header.php'); ?>

	<!--=======  breadcrumb area =======-->

	<div class="breadcrumb-area pt-15 pb-15" style="border-bottom: 1px solid #d8d8d8;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb-list text-left">
						<li class="breadcrumb-list__item"><a href="index.php">HOME</a></li>
						<li class="breadcrumb-list__item"><a href="products.php">PRODUCTS</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">CART</li>
					</ul>

				</div>
			</div>
		</div>
	</div>

	<!--=======  End of breadcrumb area =======-->

	<!--=============================================
	=            cart page content         =
	=============================================-->
	<h6 class="text-center bg-danger" style="color: white; font-size: 15px;"><?php display_message(); ?></h6><br>
	<div class="shopping-cart-area mb-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-30">
					<!--=======  cart table  =======-->

					<div class="cart-table-container">
						<table class="cart-table" style="border: none;">
							<thead>
								<tr>
									<th class="product-name" colspan="2">Product</th>
									<th class="product-price text-center">Price</th>
									<th class="product-quantity text-center">Quantity</th>
									<th class="product-subtotal text-center">Total</th>
									<th class="product-remove text-center">&nbsp;</th>
								</tr>
							</thead>

							<tbody>
								<?php cart(); ?>
							</tbody>
						</table>
					</div>

					<!--=======  End of cart table  =======-->
				</div>
				<div class="col-lg-4 mb-20">
					<!--=======  coupon area  =======-->
					<div class="cart-calculation-area">
						<h3 class="mb-30">Cart Total</h3>

						<table class="cart-calculation-table mb-30">
							<tbody><tr>
								<th>TOTAL</th>
								<td class="total"><?php echo $_SESSION['cur_type'] ?> <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0" ?></td>
							</tr>
						</tbody></table>
					

						<div class="cart-calculation-button text-center">
							<a class="lezada-button lezada-button--medium" href="checkout.php">proceed to checkout</a>
						</div>
						
					</div>
					<!--=======  End of coupon area  =======-->
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of cart page content  ======-->

<?php include('footer.php'); ?>