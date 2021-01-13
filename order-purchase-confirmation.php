<?php include "dbconn.php" ?>
<?php include('header.php'); ?>
<?php
	session_start();
	if (!isset($_SESSION['usernow'])) {
		redirect('login.php');
		exit(0);
	}else if(isset($_GET['id'])){
		// SMS Block
			$curl = curl_init();
			$apikey = '3635986273755351334';
			$userId = 'yrbprojects';
			$password = 'Yrb@1234';
			$sendMethod = 'simpleMsg';
			$messageType = 'text';
			$senderId = 'VPIPAL';
			$mobile = $_SESSION['mobile_number'];
			$msg = "Confirmed: Thank you for shopping on PIPALTREE. We're prepping your order.";
			$scheduleTime = '';

			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://www.smsgateway.center/SMSApi/rest/send",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "userId=$userId&password=$password&senderId=$senderId&sendMethod=$sendMethod&msgType=$messageType&mobile=$mobile&msg=$msg&duplicateCheck=true&format=json",
				CURLOPT_HTTPHEADER => array(
					"apikey: $apikey",
					"cache-control: no-cache",
					"content-type: application/x-www-form-urlencoded"
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			// if ($err) {
			// 	echo "cURL Error #:" . $err;
			// } else {
			// 	echo $response;
			// }
		// END SMS Block
		$order_id=$_GET['id'];
		$sql="SELECT * FROM orders WHERE `order_reference_number`='$order_id' AND `payment_status`='Success' ";
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			while($row=fetch_array($result))
			{
				$order_id=$row['order_reference_number'];
				$customers_id=$row['customers_id'];
				$payment_id=$row['payment_methods_id'];
				$payment_status=$row['payment_status'];
				$customer_name=$row['customer_name'];
				$customer_address_line_1=$row['customer_address_line_1'];
				$customer_address_line_2=$row['customer_address_line_2'];
				$customer_district=$row['customer_district'];
				$customer_state=$row['customer_state'];
				$customer_country_name=$row['customer_country_name'];
				$customer_zip_code=$row['customer_zip_code'];

			}
		}
	}else{

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
						<li class="breadcrumb-list__item breadcrumb-list__item--active">ORDER CONFIRMATION</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!--=======  End of breadcrumb area =======-->

<!--=============================================
    =            about two page content         =
    =============================================-->
	<div class="about-page-content">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12 mt-25 mb-sm-50">
					<!--=======  about single block  =======-->

					<div class="about-single-block">
						<h1 class="mb-15">Thank You for Shopping With Us</h1>
						<p class="mb-15"><strong>Shipping to <?php echo $customer_name; ?></strong> <?php echo $customer_address_line_1; ?>, <?php echo $customer_district; ?>, <?php echo $customer_country_name; ?>, <?php echo $customer_zip_code; ?></p>
					</div>

					<!--=======  End of about single block  =======-->
                </div>
            </div>
		</div>
	</div>
    <hr>
    <!--=====  End of about two page content  ======-->
    <!--=============================================
    =            feature brand list         =
    =============================================-->

	<div class="feature-brand-list mb-90">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-3 col-sm-6">
					<!--=======  single brand  =======-->

					<div class="blog-intro">
						<h4>Sunday, 31 Dec</h4>
						<p>Delivery Date</p>
						<!-- <a href="blog-standard-left-sidebar.html" class="lezada-button lezada-button--medium">view all</a> -->
					</div>

					<!--=======  End of single brand  =======-->
				</div>
			</div>
			<div class="row align-items-center" style="justify-content: center;">
				<?php 
					$sql_order="SELECT * FROM orders_history WHERE `order_reference_number`='$order_id' AND `customer_id`='$customers_id' AND `status`='Success'";
					$result_order_history=$conn->query($sql_order);
					if($result_order_history->num_rows>0)
					{
						while($row=fetch_array($result_order_history))
						{
							$product_id=$row['product_id'];
							
							$prod_sql="SELECT * FROM products WHERE product_id='$product_id'";
							$prod_res=$conn->query($prod_sql);
							if($prod_res->num_rows>0)
							{
								while($row=fetch_array($prod_res))
								{
									$correl_id=$row['correl_id'];
									$product_name=$row['product_name'];
									$prod_img_sql="SELECT * FROM product_images WHERE correl_id='$correl_id' AND product_image LIKE '%main_%'";
									$prod_img_res=$conn->query($prod_img_sql);
									if($prod_img_res->num_rows>0)
									{
										while($row=fetch_array($prod_img_res))
										{
											$product_image=$row['product_image'];
										}
									}
								}
							}
							?>
						<div class="col-lg-3 col-md-3 col-sm-6">
							<!--=======  single brand  =======-->
								<div class="single-brand text-center mb-30">
									<a href="product.php?id=<?php echo $correl_id; ?>">
										<img src="/admin/uploads/<?php echo $product_image; ?>" class="img-fluid" style="height: 300px;" alt="">
									</a>
									<div class="mt-10">
										<h4><a href="product.php?id=<?php echo $correl_id; ?>"><?php echo $product_name; ?></a></h4>
									</div>
								</div>
							<!--=======  End of single brand  =======-->
						</div>
						<?php
						}
					}
				?>	
			</div>
		</div>
	</div>

	<!--=====  End of feature brand list  ======-->
<?php include('footer.php'); ?>