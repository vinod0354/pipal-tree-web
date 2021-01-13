<?php 
    include "dbconn.php";
    include('header.php'); ?>

<!--=======  breadcrumb area =======-->

<div class="breadcrumb-area pt-15 pb-15" style="border-bottom: 1px solid #d8d8d8;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">

					<!--=======  breadcrumb list  =======-->

					<ul class="breadcrumb-list text-left">
						<li class="breadcrumb-list__item"><a href="index.php">HOME</a></li>
						<li class="breadcrumb-list__item breadcrumb-list__item--active">LOGOUT</li>      
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
                        <div class="row">
                            <div class="col-lg-12">
                                <!--=======  login title  =======-->

                                <div class="section-title section-title--login text-center mb-25">
                                    <h2 class="mb-20" style="font-weight:600;">LogOut</h2>
                                    
                                </div>
                                <div class="mb-30">
                                    <?php 
                                        session_start();
                                        unset($_SESSION['usernow']);
                                        session_destroy();
                                        echo "<script>window.location.href='index.php';</script>";
                                        exit();
                                    ?>
                                    </div>	

                                <!--=======  End of login title  =======-->
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--=====  End of login content  ======-->

<?php include('footer.php'); ?>