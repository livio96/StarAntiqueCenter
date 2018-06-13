<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin || STAR ANTIQUE CENTER </title>
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
  <body >

    <header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container">
						<div class="d-flex justify-content-between align-items-center">
							<ul class="list">
         <?php 

          if(isset($_SESSION['username'])){
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="DeleteOrder.php">Delete an order</a></li>';
            echo '<li><a href="DeleteItem.php">Delete an item</a></li>';
            echo '<li><a href="ChangeName.php">Change name</a></li>';
            echo '<li><a href="ChangePrice.php">Change prices</a></li>';
            echo '<li><a href="ChangeQuantity.php">Change quantity</a></li>';
            echo '<li><a href="all_orders.php">All orders</a></li>';
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

<li style="position:  width:80%; background-color:white; left:750px; top:1px" class="categories">
    <form method="POST" action=''>
    <input type="submit" id= "submit_btn" name="Jewelries"  value="Jewelries">
    <input type="submit" name="Frames"  value="Frames">
    <input type="submit" name="Pottery"  value="Pottery">
    <input type="submit" name="Watches"  value="Watches">
    <input type="submit" name="Furniture"  value="Furniture">

    <div class="row" style="margin-top:50px; margin-left:100px; ">
      <div class="large-12">
        <?php
      
        $result = $mysqli->query('SELECT * FROM products'); 
        
          if($result) {
            while($obj = $result->fetch_object()) {
              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price</strong>: $'.$obj->price.'</p>';
              echo '<div class="large-6 columns" style="padding-left:0;">';
              echo '<form method="post" name="update-quantity" action="admin-update.php">';
              echo '</div>';
              echo '<div class="large-6 columns">';
             
    

              echo '</div>';
              echo '</div>';
            }
          }
          
  
        ?>



      </div>
    </div>


    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;">&copy; STAR ANTIQUE CENTER. All Rights Reserved.</p>
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
