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
						<li class="breadcrumb-list__item breadcrumb-list__item--active">CHECKOUT</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!--=======  End of breadcrumb area =======-->

	<!--=============================================
	=            checkout page content         =
	=============================================-->
	
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


	
	
	if(isset($_POST['submit']))
	{
		$order_reference_number=uniqid(); 
		echo $order_reference_number;
		$_SESSION['orderID']=$order_reference_number;
		$customer_name=$_POST['customer_name'];
		$_SESSION['cname']=$customer_name;
		$customer_email=$_POST['customer_email'];
		$_SESSION['cemail']=$customer_email;
		$customer_mobile=$_POST['customer_mobile'];
		$_SESSION['cnumber']=$customer_mobile;
		$customer_address_line_1=$_POST['customer_address_line_1'];
		$customer_address_line_2=$_POST['customer_address_line_2'];
		$customer_country_name=$_POST['customer_country_name'];
		$customer_district=$_POST['customer_district'];
		$customer_state=$_POST['customer_state'];
		$customer_zip_code=$_POST['customer_zip_code'];
		$billing_name=$_POST['billing_name'];
		$billing_email=$_POST['billing_email'];
		$billing_mobile=$_POST['billing_mobile'];
		$billing_address_line_1=$_POST['billing_address_line_1'];
		$billing_address_line_2=$_POST['billing_address_line_2'];
		$billing_country_name=$_POST['billing_country_name'];
		$billing_district=$_POST['billing_district'];
		$billing_state=$_POST['billing_state'];
		$billing_zip_code=$_POST['billing_zip_code'];
        
	   $is_billing_add_same=$_POST['is_billing_add_same'];
	   $is_save_address=$_POST['is_save_address'];
		
		//query for inserting cart products into table
		
		//PRODUCT ID, QUANTITY, PRICE
		
        if($is_billing_add_same=="yes")
        {
            $sql= "INSERT INTO orders(order_reference_number,customers_id,customer_name,customer_email,customer_mobile,customer_address_line_1,customer_address_line_2,customer_country_name,customer_district,customer_state,customer_zip_code,billing_name,billing_email,billing_mobile,billing_address_line_1,billing_address_line_2,billing_country_name,billing_district,billing_state,billing_zip_code,sub_total,discount_amount,tax_amount,delivery_charges,grand_total,payment_methods_id,payment_method)
			VALUES('$order_reference_number','$id','$customer_name','$customer_email','$customer_mobile','$customer_address_line_1','$customer_address_line_2','$customer_country_name','$customer_district','$customer_state','$customer_zip_code','$customer_name','$customer_email','$customer_mobile','$customer_address_line_1','$customer_address_line_2','$customer_country_name','$customer_district','$customer_state','$customer_zip_code','{$_SESSION['item_total']}','0','0','0','{$_SESSION['item_total']}','','razorpay')";
            $result=$conn->query($sql);
			
            if($result)
            {	
				if($is_save_address=="yes")
				{
					$sqladd="INSERT INTO address(customer_id,name,email_id,mobile_number,address_line_1,address_line_2,country,city,state,zipcode)
					VALUES('$id','$customer_name','$customer_email','$customer_mobile','$customer_address_line_1','$customer_address_line_2','$customer_country_name','$customer_district','$customer_state','$customer_zip_code')";
					$resultadd=$conn->query($sqladd);
					if($resultadd)
					{
						echo "<script>window.location.href='checkout-order-summary.php';</script>";
						
					}else
					{
						echo "<script>alert('Something Went Wrong in Shipping Address!')</script>";
					}
				}
				else
				{
					echo "<script>window.location.href='checkout-order-summary.php';</script>";
				}
            }
            else{

                echo "<script>alert('Something Went Wrong in Billing Information!')</script>";
            }
        }else
        {
            $sql="INSERT INTO orders(order_reference_number,customers_id,customer_name,customer_email,customer_mobile,customer_address_line_1,customer_address_line_2,customer_country_name,customer_district,customer_state,customer_zip_code,billing_name,billing_email,billing_mobile,billing_address_line_1,billing_address_line_2,billing_country_name,billing_district,billing_state,billing_zip_code,sub_total,discount_amount,tax_amount,delivery_charges,grand_total,payment_methods_id,payment_method)
			VALUES('$order_reference_number','$id','$customer_name','$customer_email','$customer_mobile','$customer_address_line_1','$customer_address_line_2','$customer_country_name','$customer_district','$customer_state','$customer_zip_code','$billing_name','$billing_email','$billing_mobile','$billing_address_line_1','$billing_address_line_2','$billing_country_name','$billing_district','$billing_state','$billing_zip_code','{$_SESSION['item_total']}','0','0','0','{$_SESSION['item_total']}','','razorpay')";
            $result=$conn->query($sql);
            if($result)
            {
                if($is_save_address=="yes")
				{
					$sqladd="INSERT INTO address(customer_id,name,email_id,mobile_number,address_line_1,address_line_2,country,city,state,zipcode)
					VALUES('$id','$customer_name','$customer_email','$customer_mobile','$customer_address_line_1','$customer_address_line_2','$customer_country_name','$customer_district','$customer_state','$customer_zip_code')";
					$resultadd=$conn->query($sqladd);
					if($resultadd)
					{
						echo "<script>window.location.href='checkout-order-summary.php';</script>";
					}else
					{
						echo "<script>alert('Something Went Wrong in Shipping Address!')</script>";
					}
				}
				else
				{
					echo "<script>window.location.href='checkout-order-summary.php';</script>";
				}
            }
            else{

                echo "<script>alert('Something Went Wrong in Billing Information!')</script>";
            }
		}
	}
	?>
	

	<div class="checkout-page-area mt-60 mb-60">
		<div class="container">
		<?php $addsql2="SELECT * FROM address where customer_id='$id'";
			$res2=$conn->query($addsql2);
			if($res2->num_rows>0)
			{?>
			<h3>Select a delivery address</h3>
			<?php }?>
		    <div class="row">
			
				<?php $addsql="SELECT * FROM address where customer_id='$id'";
				$res=$conn->query($addsql);
				if($res->num_rows>0)
				{
					while($row=fetch_array($res))
					{
						$address_id=$row['addr_id'];
						$name=$row['name'];
						$email_id=$row['email_id'];
						$mobile_number=$row['mobile_number'];
						$address_line_1=$row['address_line_1'];
						$address_line_2=$row['address_line_2'];
						$country_name=$row['country'];
						$district=$row['city'];
						$state_name=$row['state'];
						$zip_code=$row['zipcode'];
						?>
				<div class="col-12 col-lg-4 col-md-4 mb-30">
				
				    <div class='myaccount-content' style="height:300px">
						<div class="row">
						    <div class="col-12">
								<address style="height:150px;">
										<p><strong><?php echo $name ?></strong></p>
										<p><?php echo $address_line_1?>,<?php echo $address_line_2?><br>
										<?php echo $district?>,<?php echo $state_name?>,<?php echo $zip_code?><br>
										<?php echo $country_name?></p>

								</address>
								<form action='' enctype="multipart/form-data" method="POST" class="checkout-form">
									<input type="hidden" name="addr_id" value="<?php echo $address_id?>">
									<button class="lezada-button lezada-button--medium mt-30 mb-30"  type="submit" name="deliver">Deliver To This Address</button>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php	}
				}?>

				<?php
				if(isset($_POST['deliver']))
				{
					$order_reference_number=uniqid();
					$addrID=$_POST['addr_id'];
					$sqladd="SELECT * FROM address where addr_id='$addrID' AND customer_id='$id'";
					$resadd=$conn->query($sqladd);
					while($row=fetch_array($resadd))
					{
						$add_address_id=$row['addr_id'];
						$order='OID'.rand(100,1000);
						$_SESSION['orderID']=$order_reference_number;
						$add_name=$row['name'];
						$_SESSION['cname']=$add_name;
						$add_email_id=$row['email_id'];
						$_SESSION['cemail']=$add_email_id;
						$add_mobile_number=$row['mobile_number'];
						$_SESSION['cnumber']=$add_mobile_number;
						$add_address_line_1=$row['address_line_1'];
						$add_address_line_2=$row['address_line_2'];
						$add_country_name=$row['country'];
						$add_district=$row['city'];
						$add_state_name=$row['state'];
						$add_zip_code=$row['zipcode'];
					}
						//query for inserting cart products into table
		

					if($resadd)
					{	
						$sql="INSERT INTO orders(order_reference_number,customers_id,customer_name,customer_email,customer_mobile,customer_address_line_1,customer_address_line_2,customer_country_name,customer_district,customer_state,customer_zip_code,billing_name,billing_email,billing_mobile,billing_address_line_1,billing_address_line_2,billing_country_name,billing_district,billing_state,billing_zip_code,sub_total,discount_amount,tax_amount,delivery_charges,grand_total,payment_methods_id,payment_method)
						VALUES('$order_reference_number','$id','$add_name','$add_email_id','$add_mobile_number','$add_address_line_1','$add_address_line_2','$add_country_name','$add_district','$add_state_name','$add_zip_code','$add_name','$add_email_id','$add_mobile_number','$add_address_line_1','$add_address_line_2','$add_country_name','$add_district','$add_state_name','$add_zip_code','{$_SESSION['item_total']}','0','0','0','{$_SESSION['item_total']}','','razorpay')";
						$result=$conn->query($sql);
						if($result)
						{
							echo "<script>window.location.href='checkout-order-summary.php';</script>";
						}else
						{
							echo "<script>alert('Something Went Wrong in Shipping Address!')</script>";
						}
					}	
				}

				?>

			</div>
			<div class="row">
				<div class="col-12">
					<div class="lezada-form">
						<!-- Checkout Form s-->
						<form action="" enctype="multipart/form-data" method="POST" class="checkout-form">
							<div class="row row-40">

								<div class="col-lg-7 mb-20">

									<!-- Billing Address -->
									<div id="billing-form" class="mb-40">
										<h4 class="checkout-title">Shipping Information</h4>

										<div class="row">

											<div class="col-md-12 col-12 mb-20">
												<label>Name</label>
												<input type="text" placeholder="Name" name="customer_name">
											</div>

											<input type="hidden" value="<?php echo 'OID'.rand(100,1000);?>" name="orderid">

											<div class="col-md-6 col-12 mb-20">
												<label>Email Address</label>
												<input type="email" placeholder="Email Address" name="customer_email">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Phone no</label>
												<input type="number" placeholder="Phone number" name="customer_mobile">
											</div>

											<div class="col-12 mb-20">
												<label>Address</label>
												<input type="text" placeholder="Address line 1" name="customer_address_line_1">
												<input type="text" placeholder="Address line 2" name="customer_address_line_2">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Country</label>
												<input type="text" placeholder="Country" name="customer_country_name">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Town/City</label>
												<input type="text" placeholder="Town/City" name="customer_district">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>State</label>
												<input type="text" placeholder="State" name="customer_state">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Zip Code/Pin Code</label>
												<input type="number" placeholder="Zip Code/Pin Code" name="customer_zip_code">
											</div>

											<div class="col-12 mb-20">
												<div class="row">
													<div class="check-box col-lg-6 col-md-6 col-12 mt-5" style="margin-right: 0;">
														<input type="hidden" name="is_billing_add_same"  <?php if($is_billing_add_same=="no") {echo "checked";}?> value="no"/>
														<input type="checkbox" name="is_billing_add_same" id="create_account" <?php if($is_billing_add_same=="yes") {echo "checked";}?> value="yes"> 
														<label for="create_account">Billing Address is Same</label>
													</div>
													<div class="check-box col-lg-6 col-md-6 col-12 mt-5" style="margin-right: 0;">
														<input type="hidden" name="is_ship_add_diff"/>
														<input type="checkbox" id="shiping_address" data-shipping>
														<label for="shiping_address">Billing Address is Different</label>
													</div>
													<div class="check-box col-lg-6 col-md-6 col-12 mt-5" style="margin-right: 0;">
														<input type="hidden" name="is_save_address" <?php if($is_save_address=="no") {echo "checked";}?> value="no"/>
														<input type="checkbox" id="save_address" name="is_save_address" <?php if($is_save_address=="yes") {echo "checked";}?> value="yes">
														<label for="save_address">Save Address</label>
													</div>
												</div>
											</div>

										</div>

									</div>

									<!-- Shipping Address -->
									<!-- Shipping Address -->
									<div id="shipping-form" class="mb-40">
										<h4 class="checkout-title">Billing Information</h4>

										<div class="row">

											<div class="col-md-12 col-12 mb-20">
												<label>Name</label>
												<input type="text" placeholder="Name" name="billing_name">
											</div>

										

											<div class="col-md-6 col-12 mb-20">
												<label>Email Address</label>
												<input type="email" placeholder="Email Address" name="billing_email">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Phone no</label>
												<input type="number" placeholder="Phone number" name="billing_mobile">
											</div>

										

											<div class="col-12 mb-20">
												<label>Address</label>
												<input type="text" placeholder="Address line 1" name="billing_address_line_1">
												<input type="text" placeholder="Address line 2" name="billing_address_line_2">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Country</label>
												<input type="text" placeholder="Country" name="billing_country_name">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Town/City</label>
												<input type="text" placeholder="Town/City" name="billing_district">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>State</label>
												<input type="text" placeholder="State" name="billing_state">
											</div>

											<div class="col-md-6 col-12 mb-20">
												<label>Zip Code/Pin Code</label>
												<input type="number" placeholder="Zip Code/Pin Code" name="billing_zip_code">
											</div>

										</div>

									</div>

								</div>

								<div class="col-lg-5">
									<div class="row">

										<!-- Cart Total -->
										<div class="col-12 mb-60">

											<h4 class="checkout-title">Cart Total</h4>

											<div class="checkout-cart-total">

												<h4>Product <span>Total</span></h4>

												<?php reports() ?>

												<p>Sub Total <span name="sub_total"><?php echo $_SESSION['cur_type']; ?> <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0" ?></span></p>
												<p>Shipping Fee <span>Free Shipping</span></p>

												<h4>Grand Total <span name="grand_total"><?php echo $_SESSION['cur_type']; ?> <?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0" ?></span></h4>

											</div>
											<button class="lezada-button lezada-button--medium mt-30" name="submit">Place order</button>

										</div>

										<!-- Payment Method -->
										<?php customer_cart(); ?>

									</div>
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of checkout page content  ======-->

<?php include('footer.php'); ?>