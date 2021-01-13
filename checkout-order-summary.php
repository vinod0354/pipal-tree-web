<?php include "dbconn.php" ?>
<?php include('header.php'); ?>

	<!--=======  breadcrumb area =======-->
	
	<div class="breadcrumb-area pt-15 pb-15" style="border-bottom: 1px solid #d8d8d8;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list">
						<li class="breadcrumb-list__item"><a href="index">HOME</a></li>
						<li class="breadcrumb-list__item"><a href="products.php">PRODUCTS</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Order Summary</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>

	<!--=======  End of breadcrumb area =======-->

	<!--=============================================
	=            checkout page content         =
	=============================================-->

	<div class="checkout-page-area mb-50 mt-50">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="cart-table-container mt-30">
						<table class="cart-table">
							<thead>
								<tr>
									<th class="product-name" colspan="2">Product</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-subtotal">Total</th>
								</tr>
							</thead>

							<tbody>
								<?php order_summary(); ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-12 mt-20" style="background:white;">
					<div class="single-method">
						<input type="checkbox" id="accept_terms" required="">
						<label for="accept_terms">I’ve read and accept the terms & conditions</label>
					</div>
				</div>
				<div class="col-xl-6 offset-xl-6 col-lg-6 offset-lg-6">
					<div class="cart-calculation-area text-right" style="background:white;">
						<table class="cart-calculation-table mb-30">
							<tr>
								<th>Total</th>
								<td class="subtotal"><?php echo $_SESSION['cur_type'] ?> <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?></td>
                            </tr>
                            <tr>
								<th>Discount</th>
								<td class="subtotal">00.00</td>
							</tr>
							<tr>
								<th>Subtotal</th>
								<td class="subtotal"><?php echo $_SESSION['cur_type'] ?> <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?></td>
                            </tr>
                            <tr>
								<th>Service Charges</th>
								<td class="subtotal">00.00</td>
                            </tr>
                            <tr>
								<th>Shipping Charges</th>
								<td class="subtotal">00.00</td>
                            </tr>
                            <tr>
								<th>Grand Total</th>
								<td class="total"><?php echo $_SESSION['cur_type'] ?> <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0"; ?></td>
                            </tr>
                        </table>

						<div class="cart-calculation-button text-right">
						    <button class="lezada-button lezada-button--medium" type="button" id="rzp-button1">Pay Now</button>
                        </div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of checkout page content  ======-->
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<form name='razorpayform' action="" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
	</form>
    <script type="text/javascript">
		var name = "<?php echo $_SESSION['cname']; ?>";
		var email = "<?php echo $_SESSION['cemail']; ?>";
		var mobile = "<?php echo $_SESSION['cnumber']; ?>";
		
		var options = {
			"key": "rzp_live_E2DVfxJzcMZKYp",
			"amount": "<?php echo 1*100;?>", // 2000 paise = INR 20
			"currency": "INR",
			"name": "Pipal Tree",
			"description": "Credits towards Pipal Tree",
			"order_id": "",
			handler: function (response) {
				document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;

				if (typeof response.razorpay_payment_id == 'undefined' ||  response.razorpay_payment_id < 1) {
					alert('Response Failed');
					window.location.href = 'checkout-order-summary.php';
				
				} else {
					var payment_id=response.razorpay_payment_id;
					var url_id = "<?php echo $_SESSION['orderID']; ?>";
					$.ajax({url:"cart-function.php?id="+payment_id,cache:false,success:function(result){
						Swal.fire({
						text: 'Order placed successfully',	
						icon: 'success',
						title: 'Success',
						allowOutsideClick: false,
						showConfirmButton: true
						}).then(()=>{
							window.location.href = 'order-purchase-confirmation.php?id=' + url_id;
						});
					}});
				}
	
			},
			"prefill": {
				"name": name,
				"email": email,
				"contact": mobile
			},
			"notes": {
				"address": "Address"
			},
			"theme": {
				"color": '#79b833',
				"image_padding": false
			},
		};
		var rzp1 = new Razorpay(options);
		rzp1.on('payment.failed', function (response){
			alert(response.error.code);
			alert(response.error.description);
			alert(response.error.metadata.payment_id);
		});
		document.getElementById('rzp-button1').onclick = function(e){
			rzp1.open();
			e.preventDefault();
		}
	</script>

<?php echo include('footer.php'); ?>