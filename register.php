<?php


//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}


include 'config.php';
?>



<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register || STAR ANTIQUE CENTER</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
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
  <body style="background-color:lightpink;">

    	<!-- Start Header Area -->
			<header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container">
						<div class="d-flex justify-content-between align-items-center">
							<ul class="list">
         <?php 

          if(isset($_SESSION['username'])){
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="about.php">About</a></li>';
            echo '<li><a href="account.php">Account Details</a></li>';
            echo '<li><a href="products.php">All Products</a></li>';
            echo '<li><a href="cart.php">Shopping Cart</a></li>';
            echo ' <li><a href="mailto:liviob@live.com">Contact Support: liviob@live.com</a></li>' ; 
            echo '<li><a href="logout.php">Log Out</a></li>';

          }
          else{
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="about.php">About</a></li>';
            echo '<li><a href="login.php">Log In</a></li>';
            echo ' <li><a href="mailto:liviob@live.com">Contact Support: liviob@live.com</a></li>' ; 
          }
          ?>
														
							</ul>
							
						</div>
					</div>					
				</div>


			</header>
			<!-- End Header Area -->





    <form method="POST" action="insert.php" style="margin-top:30px; margin-left:300px; ">
      <div class="row">
        <div class="small-8">

          <div class="row" style="margin-top:100px;">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">First Name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" name="fname" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Last Name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label"  name="lname" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Address</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label"  name="address" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">City</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label"  name="city" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">ZIP Code</label>
            </div>
            <div class="small-8 columns">
              <input type="number" id="right-label"  name="pin" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">E-Mail</label>
            </div>
            <div class="small-8 columns">
              <input type="email" id="right-label"  name="email" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Password</label>
            </div>
            <div class="small-8 columns">
              <input type="password" id="right-label" name="pwd" required>
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Register" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </div>
          </div>
        </div>
      </div>
    </form>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">

        <footer>
            <p style="text-align:center; font-size:0.8em;">&copy; <center><b>STAR ANTIQUE CENTER </b>. All Rights Reserved.</center></p>
        </footer>

      </div>
    </div>




    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
