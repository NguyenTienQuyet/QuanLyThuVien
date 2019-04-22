	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="../frontend/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Library</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="../frontend/css/linearicons.css">
			<link rel="stylesheet" href="../frontend/css/font-awesome.min.css">
			<link rel="stylesheet" href="../frontend/css/bootstrap.css">
			<link rel="stylesheet" href="../frontend/css/magnific-popup.css">
			<link rel="stylesheet" href="../frontend/css/nice-select.css">							
			<link rel="stylesheet" href="../frontend/css/animate.min.css">
			<link rel="stylesheet" href="../frontend/css/owl.carousel.css">			
			<link rel="stylesheet" href="../frontend/css/jquery-ui.css">			
			<link rel="stylesheet" href="../frontend/css/main.css">
			


			<!-- <script type="text/javascript" src="../js/Home.js"></script> -->

		</head>
		<body>	
		  <header id="header" id="home">
	  		@include('user.header')
		  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-between">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase">
								We Ensure better education
								for a better world			
							</h1>
							<p class="pt-10 pb-10">
								aaaaaaaaaaaaaaaaaaaaaaaaaaaa
								
							</p>
							<a href="#" class="primary-btn text-uppercase">Get Started</a>
						</div>										
					</div>
				</div>					
			</section>
			<!-- End banner Area -->
					
			<!-- Start popular-course Area -->
			@yield('content')
			<!-- End popular-course Area -->
			

						
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				@include('user.footer')
			</footer>	
			<!-- End footer Area -->	

			<div class="modal fade" id="card" role="dialog">
	            <div class="modal-dialog">
	                
	                <div class="modal-content">
	                    <!-- <form > -->
	                        <!-- <input type="hidden" name="_method" value="delete"> -->
	                        <!-- {{csrf_field()}} -->
	                    
	                <!-- Modal content-->
	                
	                        <div class="modal-header">
	                        	<h4 class="modal-title">Confirm</h4>
	                            <button type="button" class="close" data-dismiss="modal">&times;</button>
	                            
	                        </div>
	                        <div class="modal-body">
	                            
	                            <!-- <span id="form_output"></span> -->
	                            <!-- <div class="row" > -->
	                                <div class="col-xs-12" style="text-align: center;">
	                                    <!-- PAGE CONTENT BEGINS -->
	                                    <h4>You may want to register card ?</h4>

	                                </div>
	                            <!-- </div> -->

	                        </div>  
	                        
	                        <div class="modal-footer">
	                            <input type="hidden" id="card_user_id" value="" />
	                            <input type="button" value="No" data-dismiss="modal" >
	                                
	                            <input type="button" id="register_card" value="Yes">
	                                <!-- <i class="ace-icon fa fa-trash-o bigger-120 orange"></i> -->
	                                
	                            
	                        </div>
	                    <!-- </form> -->
	                        
	                    
	                </div>
	            </div>
			</div>


			<div class="modal fade" id="confirm_logout" role="dialog">
			    <div class="modal-dialog">

			        <div class="modal-content">
			            <!-- <form method="get" class="form-delete">
			                <input type="hidden" name="_method" value="delete">
			                {{csrf_field()}} -->

			        <!-- Modal content-->

			                <div class="modal-header">
			                	<h4 class="modal-title">Confirm</h4>
			                    <button type="button" class="close" data-dismiss="modal">&times;</button>
			                    
			                </div>
			                <div class="modal-body">

			                    <span id="form_output"></span>
			                    <div class="row">
			                        <div class="col-xs-12">
			                            <!-- PAGE CONTENT BEGINS -->
			                            <h4 style="margin-left: 130px;">You may want to logout ?</h4>

			                        </div>
			                    </div>

			                </div>

			                <div class="modal-footer">
			                    <input type="hidden" id="user-delete" value="" />
			                    <input value="No" type="button" data-dismiss="modal">

			                    <input value="Yes" type="button" id="logout_user">
			                </div>
			            <!-- </form> -->


			        </div>
			    </div>
			</div>


			<script src="../frontend/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="../frontend/js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="../frontend/js/easing.min.js"></script>			
			<script src="../frontend/js/hoverIntent.js"></script>
			<script src="../frontend/js/superfish.min.js"></script>	
			<script src="../frontend/js/jquery.ajaxchimp.min.js"></script>
			<script src="../frontend/js/jquery.magnific-popup.min.js"></script>	
    		<script src="../frontend/js/jquery.tabs.min.js"></script>						
			<script src="../frontend/js/jquery.nice-select.min.js"></script>	
			<script src="../frontend/js/owl.carousel.min.js"></script>									
			<script src="../frontend/js/mail-script.js"></script>	
			<script src="../frontend/js/main.js"></script>	

			

			
			<script type="text/javascript" src="../js/Home.js"></script>


		</body>
	</html>