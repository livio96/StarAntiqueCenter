<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>
	
<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="CodePixar">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Star Antique Center</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">
		    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
		    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			<!-- Start Header Area -->
			<header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container">
						<div class="d-flex justify-content-between align-items-center">
							<ul class="list">
         <?php 

          if(isset($_SESSION['username']) and $_SESSION['type'] =='user' ){
            echo '<h4> Welcome back</h4> ' ; 
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="about.php">About</a></li>';
            echo '<li><a href="account.php">Account Details</a></li>';
            echo '<li><a href="products.php">All Products</a></li>';
            echo '<li><a href="cart.php">Shopping Cart</a></li>';
            echo ' <li><a href="mailto:liviob@live.com">Contact Support: liviob@live.com</a></li>' ; 
            echo '<li><a href="logout.php">Log Out</a></li>';

          }
          elseif (isset($_SESSION['username']) and $_SESSION['type'] =='admin') {
            echo '<h4> Welcome admin</h4> ' ; 
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="about.php">About</a></li>';
            echo '<li><a href="account.php">Account Details</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
              
          }
          else{
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="about.php">About</a></li>';
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
            echo ' <li><a href="mailto:liviob@live.com">Contact Support: liviob@live.com</a></li>' ; 
          }
          ?>
														
							</ul>
							
						</div>
					</div>					
				</div>


			</header>
			<!-- End Header Area -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="container-fluid">
					<div class="row fullscreen align-items-center justify-content-center">
						<div  class="col-lg-6 col-md-12 d-flex align-self-end img-right no-padding">
							<img class="img-fluid" src="images/front_page.jpeg" alt="">
						</div>
						<div class="banner-content col-lg-6 col-md-12">
							<h1 class="title-top"><span>STAR</span> Antique Center</h1>
							<h1 class="text-uppercase">
								Great Products! <br>
								Great Deals!
							</h1>
							<button class="primary-btn text-uppercase"><a href="login.php">Login</a></button> 
                            <button style="position:absolute; left:200px; "class="primary-btn text-uppercase"><a href="register.php">Register</a></button> 

						</div>							
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
            <hr/>
			<!-- Start category Area -->
			<section class="category-area section-gap section-gap" id="catagory">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-40">
							<div class="title text-center">
								<h1 class="mb-10">Check out our new products</h1>
								<p>These great deals are just one click away.</p>
							</div>
						</div>
					</div>					
					<div style="width:1800px;" class="row">
						<div  class="col-lg-8 col-md-8 mb-10">
							<div  class="row category-bottom">
								
							
								<div class="col-lg-12">
									<div class="content">
										<a href="login.php" target="_blank">
									      <div class="content-overlay" ></div>
									  		 <img class="content-image img-fluid d-block mx-auto" src="images/hottest_deals.jpg" alt="">
									      <div class="content-details fadeIn-bottom">
                                            <?php
                                            if(isset($_SESSION['username'])){
									        echo'<h3 class="content-title">Shop Now</h3>' ; }
                                            else {
                                             echo'<h3 class="content-title">Log in and start shopping</h3>' ; }

                                            ?>
                                              
									      </div>
									    </a>
									</div>
							  	</div>																
							</div>							
						</div>
						
				</div>	
			</section>
			<!-- End category Area -->
			
		
		
	
				

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>
			<script src="js/jquery.sticky.js"></script>
			<script src="js/ion.rangeSlider.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>			
			<script src="js/main.js"></script>	
			
		</body>
	</html>