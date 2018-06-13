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
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>About Us || Star Antique Center</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">			
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>
			<!-- Start banner Area -->
			<section class="generic-banner relative">
			<!-- Start Header Area -->
					<header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container">
						<div class="d-flex justify-content-between align-items-center">
							<ul class="list">
         <?php 

          if(isset($_SESSION['username'])){
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="account.php">Account Details</a></li>';
            echo '<li><a href="products.php">All Products</a></li>';
            echo '<li><a href="cart.php">Shopping Cart</a></li>';
            echo ' <li><a href="mailto:liviob@live.com">Contact Support: liviob@live.com</a></li>' ; 
            echo '<li><a href="logout.php">Log Out</a></li>';

          }
          else{
            echo '<li><a href="index.php">Home</a></li>';
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
				<div class="container">
					<div class="row height align-items-center justify-content-center">
						<div class="col-lg-10">
							<div class="generic-banner-content">
								<h2 class="text-white text-center">About Us</h2>
								<p class="text-white">We have been in this business for 75 years<br>We have always succeeded to offer the best products and services to our customers</p><br><br>
                                <p class="text-white" >Star Antique Center has a large collection of vintage finds, including a wide array of vintage watches, jewelry and accessories. We also sell a variety of antique frames and other decorative items. Below you’ll find a sampling of the items in our store (the following list is not inclusive of everything at the store, our inventory changes daily)</p>
                                <center><ul style=" list-style-type:circle; " class="text-white">
                                <li>Vintage, mid-century and retro jewelry, watches and decor items such as mirrors, books, pictures, dishes, and children’s toys</li>
                                <li>Home accessories and renewed/refubished furniture.</li>
                                <li>Primitive and rustic house wares and furniture.</li>
                                <li>Antiques for all tastes.</li>
                                <li>Vintage seasonal items.</li>
                                </ul></center>
							</div>							
						</div>
					</div>
				</div>
			</section>		
			<!-- End banner Area -->
		
		
		</div>
		<script src="js/vendor/jquery-2.2.4.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/jquery.ajaxchimp.min.js"></script>
		<script src="js/jquery.sticky.js"></script>
		<script src="js/owl.carousel.min.js"></script>
		<script src="js/jquery.nice-select.min.js"></script>
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>