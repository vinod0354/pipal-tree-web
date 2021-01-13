<?php
  	include "dbconn.php";
	include('header.php');
	if(isset($_POST['login'])){
		$otp=$_POST['otp'];
		$cname=$_POST['cname'];
		$_SESSION['cust_name']=$cname;
		$sql = "SELECT * FROM cust_login_master where `email_id`='{$_SESSION['usernow']}' AND `one_time_pwd`='$otp'";
		$result = $conn->query($sql);
		if ($result->num_rows>0){
			while($row=fetch_array($result))
			{
				$name=$row['name'];
				$_SESSION['cname']=$name;
				$_SESSION['name']=$name;
			}
		
			echo "<script>window.location.href='checkout.php';</script>";
			
		}
		else
		{
			echo "<script type='text/javascript'>
			        Swal.fire({
						text: 'Invalid OTP',	
						icon: 'error',
						title: 'Error',
						allowOutsideClick: false,
						showConfirmButton: true
				    })
			    </script>";
		}
	}	
?>

<!--=======  breadcrumb area =======-->

<div class="breadcrumb-area pt-15 pb-15" style="border-bottom: 1px solid #d8d8d8;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list text-left">
						<li class="breadcrumb-list__item"><a href="index.php">HOME</a></li>
						<li class="breadcrumb-list__item">Login</li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">OTP</li>
					</ul>

					<!--=======  End of breadcrumb list  =======-->

				</div>
			</div>
		</div>
	</div>

    <!--=======  End of breadcrumb area =======-->
    
<!--=============================================
    =            login page content         =
    =============================================-->

	<div class="login-area mb-130 mb-md-70 mb-sm-70 mb-xs-70 mb-xxs-70 mt-50">
		<div class="container">
			<div class="row justify-content-lg-center">
				<div class="col-lg-6 mb-md-50 mb-sm-50">
					<div class="lezada-form login-form">
						<form action="#" method="POST">
							<div class="row">
								<div class="col-lg-12">
									<!--=======  login title  =======-->

									<div class="section-title section-title--login text-center mb-50">
                                        <h2 class="mb-20">OTP</h2>
                                        <p class="mb-20">OTP has been sent to your email. Please check</p>
										
									</div>

									<!--=======  End of login title  =======-->
								</div>
								<div class="col-lg-12 mb-60">
									<input type="text" placeholder="Enter OTP" name="otp">
								</div>
								<div class="col-lg-12 text-center mb-30">
									<button type="submit" name="login" class="lezada-button lezada-button--medium">Submit</button>
								</div>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>

    <!--=====  End of login content  ======-->
    
<?php include('footer.php'); ?>