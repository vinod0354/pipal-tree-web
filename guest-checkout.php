<?php
  	include "dbconn.php";
		include('header.php');
		session_start();
		if((!isset($_SESSION['name']) && $_SESSION['name'] == TRUE)){
			header ("Location: checkout.php");
		}else
		{
			if(isset($_POST['login']))
			{
				$uname=$_POST['name'];
				$email = $_POST['email_id'];
				$number=$_POST['mobile_number'];
				$correl_id=uniqid();
				$_SESSION['usernow'] = $email;
				$_SESSION['cname']=$uname;
				$_SESSION['mobile_number'] = $number;
                $otp = rand(100000,999999);
				$sql="SELECT * FROM cust_login_master WHERE `email_id`='$email'";
				$result = $conn->query($sql);
				if($result->num_rows == 0)
				{
					$sql_inst = "INSERT INTO cust_login_master(cust_corerel_id,email_id,one_time_pwd,mobile_number,name)
					             VALUES('$correl_id','$email','$otp','$number','$uname')";
					$result_inst = $conn->query($sql_inst);
					if ($result_inst){
						$_SESSION['name']=$uname;
						echo "<script type='text/javascript'>
								Swal.fire({
									icon: 'success',
									title: 'Success',
									text: 'Successfully Login',
									allowOutsideClick: false,
									showConfirmButton: true,
								}).then(function(){
									window.location.href='checkout.php';
								});
					   		</script>";
					}else{
						echo "<script type='text/javascript'>
								Swal.fire({
									icon: 'error',
									title: 'Error',
									text: 'Something Went Wrong!',
									allowOutsideClick: false,
									showConfirmButton: false,
									timer: 1000
								});
							</script>";
					}
				}else{
					echo "<script type='text/javascript'>
							Swal.fire({
								icon: 'error',
								title: 'Email Address Already Exists',
								text: 'Please click OK to Login',
								allowOutsideClick: false,
								showConfirmButton: true,
							}).then(()=>{
								window.location.href = 'login.php';
							});
						</script>";
				}
				
			}	
		}
								

?>

<!--=======  breadcrumb area =======-->

<div class="breadcrumb-area pt-30 pb-30" style="border-bottom: 1px solid #d8d8d8;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list text-left">
						<li class="breadcrumb-list__item"><a href="index.php">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">guest login</li>
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

									<div class="section-title section-title--login text-center mb-30">
										<h2 class="mb-20">Guest Login</h2>
										
									</div>

									<!--=======  End of login title  =======-->
								</div>
								<div class="col-lg-12 mb-30">
									<input type="text" placeholder="Name" name="name" required>
								</div>
								<div class="col-lg-12 mb-30">
									<input type="email" placeholder="Email ID" name="email_id" required>
								</div>
								<div class="col-lg-12 mb-30">
								    <input type="number" placeholder="Mobile Number" name="mobile_number" required>  
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