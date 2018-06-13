<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}




include 'config.php';
?>


<!doctype html>
<html class="no-js" lang="en">
  <head style="background-color:lightpink;">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || STAR ANTIQUE CENTER </title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet"  href="design_buttons.css">
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
  
    <body style="background-color:azure;">
           
    <li style=" width:90%; background-color:white; left:750px; top:-25px" class="categories">
    <form style="background-color:lightpink;" method="POST" action=''>
    <input type="submit" style="font-size:15px; height:60px; background-color:azure; border:1px solid black; " id= "submit_btn" name="Jewelries"  value="Jewelries">
    <input type="submit" style="font-size:15px; height:60px; background-color:azure;border:1px solid black;" name="Frames"  value="Frames">
    <input type="submit" style="font-size:15px; height:60px; background-color:azure;border:1px solid black;" name="Pottery"  value="Pottery">
    <input type="submit" style="font-size:15px; height:60px; background-color:azure;border:1px solid black;" name="Watches"  value="Watches">
    <input type="submit" style="font-size:15px; height:60px;background-color:azure;border:1px solid black; " name="Furniture"  value="Furniture">  
    
    
    </form>
    </li>

      
      <!--SEARCH BAR --> 
      <form action="search_results.php" method="post">
    Enter Search Term:<br />
    <input style=" width:20%; position:absolute; top=100px; " name="searchterm" type="text" size="40">
    <br />
    <input style=" position:absolute; top:30px; left:260px;" type="submit" name="submit" value="Search">
  </form>  

      <!-- _____________________________________END OF SEARCH BAR ----- -->
    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">

        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

    <header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container">
						<div class="d-flex justify-content-between align-items-center">
							<ul class="list" style="margin-top:30px; ">
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
    </nav>

    



    <div class="row" style="margin-top:80px; margin-left:100px;">
      <div class="small-12">
        
         
         

          <?php
          $i=0;
          $product_id = array();
          $product_quantity = array(); 
          $search_term = "" ; 
          $result = "" ; 
        
          
              if (isset($_POST['Jewelries']))  $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%J%" '); 
              elseif (isset($_POST['Frames'])) $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%Fr%" '); 
              elseif (isset($_POST['Pottery'])) $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%P%" '); 
              elseif (isset($_POST['Furniture'])) $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%Furn%" '); 
              elseif (isset($_POST['Watches'])) $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%W%" '); 
              else $result = $mysqli->query('SELECT * FROM products where product_code LIKE "%J%" '); 

           
          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<img src="images/products/'.$obj->product_img_name.'"/>';
              echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';



              if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
            }

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          
                       

          ?>
          
         
        <div class="row" style="margin-top:10px;">
          <div class="small-12">




        <footer style="margin-top:10px;">
           <p style="text-align:center; font-size:0.8em;clear:both;">&copy; STAR ANTIQUE CENTER. All Rights Reserved.</p>
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
