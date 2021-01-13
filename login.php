<?php
  	include "dbconn.php";
    include('header.php');
    session_start();
    if((!isset($_SESSION['usernow']) && $_SESSION['usernow'] == TRUE)){
        header ("Location: checkout.php");
    }else
    {
        if(isset($_POST['login']))
        {
            $uname=$_POST['email_id'];
            $otp = rand(100000,999999);
            $_SESSION['usernow']=$uname;
            $sql = "SELECT * FROM cust_login_master where email_id='$uname'";
            $result = $conn->query($sql);
            while($row=fetch_array($result)){
                $mobile=$row['mobile_number'];
                $_SESSION['mobile_number'] = $mobile;
            }
            if ($result->num_rows == 0){
                echo "<script type='text/javascript'>
                        Swal.fire({
                            text: 'Invalid Email. Please Try Again',	
                            icon: 'error',
                            title: 'Error',
                            allowOutsideClick: false,
                            showConfirmButton: true
                        })
                    </script>";
            }
            else
            {
                $to      = $uname; 
                $from_add="info@pipaltreestudio.com";
                $subject = 'One Time Password (OTP) to verify Email ID';
                $message=$otp;
                $message = '<html><body>';
                $message .='<div style="background:#fafafa;margin:0 auto;max-width:375px">';
                $message .= '<table style="width:100%;padding:10px 10px 0px;background:#fafafa" align="center" border="0" cellpadding="0" cellspacing="0">';
                $message .='<tbody>';
                $message .='<tr>';
                $message .='<td style="background:#fff;border:0;clear:both">';
                $message .='<table style="width:100%;color:#222222;font-family:OpenSans;font-size:14px;line-height:17px">';
                $message .='<tbody>';
                $message .='<tr><td style="padding:0 15px 5px"><p style="color:#222222;font-weight:bold;font-size:20px;padding-top:0px">OTP Requested</p>';
                $message .='<p style="padding-top:10px">Hi</p><p>Your One Time Password (OTP) is  <span style="font-size:18px;color:#000">'. $otp .'</span></p>';
                $message .='<p>The OTP will expire in few minutes if not used.</p><p style="padding-top:10px">Thank You</p><p>Pipal Tree Team</p>';
                $message .= "</tr></tbody></table>";
                $message .= "</tr></tbody></table>";
                $message .= "</body></html>";
                $headers = "From: " . $from_add . "\r\n";
                $headers .= "Reply-To: ". $to . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
                $result=mail($to, $subject, $message, $headers, '-f'.$from_add);
                if($result==TRUE)
                {
                    $sql_ins="UPDATE cust_login_master SET `one_time_pwd`='$otp' WHERE `email_id`='$uname' ";
                    $resuls_sql=$conn->query($sql_ins);
                    if($resuls_sql==TRUE)
                    {
                        echo "<script type='text/javascript'>
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success',
                                    text: 'OTP sent to mail successfully',
                                    allowOutsideClick: false,
                                    showConfirmButton: true
                                }).then(function(){
                                    window.location.href='login-authorization.php';
                                });
                            </script>";
                    }else
                    {
                        echo "<script class='alert alert-warning'>alert('Something went wrong...!')</script>";
                    }
                }else
                {
                    echo "<script class='alert alert-warning'>alert('Message could not be sent...!')</script>";
                }
            }
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
						<li class="breadcrumb-list__item breadcrumb-list__item--active">Login</li>      
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
										<h2 class="mb-20">Login</h2>
										
									</div>

									<!--=======  End of login title  =======-->
								</div>
								<div class="col-lg-12 mb-40">
									<input type="email" placeholder="Email Id" name="email_id">
									<input type="hidden" name="name" value<?php echo $name; ?>>
								</div>
								<div class="col-lg-12 text-center">
									<button type="submit" name="login" class="lezada-button lezada-button--medium mr-5">CONTINUE</button>
									<span class="remember-text">OR</span>
									<a href="guest-checkout.php" class="pipal-button lezada-button--medium ml-5">GUEST LOGIN</a>
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