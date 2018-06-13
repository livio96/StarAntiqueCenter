<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Orders || STAR ANTIQUE CENTER</title>
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
  <body style="background-color:azure;">

    <header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container">
						<div class="d-flex justify-content-between align-items-center">
							<ul class="list">
         <?php 

          if(isset($_SESSION['username']) ){
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="DeleteOrder.php">Delete an order</a></li>';
            echo '<li><a href="admin.php">Products</a></li>';

            echo '<li><a href="create_admin_acct.php">Create an account</a></li>';
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




    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>All Orders</h3>
        <hr>
          
           <!--SEARCH BAR --> 
      <form action="search_orders.php" method="post">
     <h5 style="position:absolute; top:75px; left:550px;"><strong>Search for an order by Email or ID</strong></h5><br />
    <input style=" width:20%; position:absolute; top:70px; left:850px; " name="search_email" type="text" size="40">
    <br />
    <input style=" position:absolute; top:75px; left:1120px; font-size:20px;" type="submit" name="submit_email_search" value="Search">
  </form>  
          
        <?php
          $current_date = "" ; 
          $new_date = "" ; 
          $big_total = 0 ; 
          $user = $_SESSION["username"];
          $result = $mysqli->query("SELECT * from orders order by date DESC");
  
          if($result) {
            while($obj = $result->fetch_object()) {

                //Display the time/date and order id of the most recent order
                //This statements gets executed only once during the loop iteration
                $new_date = $obj->date;   
                   
                if($new_date != $current_date) {
                echo '</br>' ; 
                echo '<h6 style="color:red;" align="center"; ><strong>ORDER ID : </strong>'.$obj->order_id.' </h6>';  
                    echo '<h6 style="color:green;" align="center";><strong>Purchase Date</strong>: '.$obj->date.'</h6>';
                echo '<h6 style="color:red;" align="center"; ><strong>Order Placed by:  </strong>'.$obj->email.' </h6>'; 
                echo '<br>'; 
            
                echo '<strong>Product Name</strong>: '.$obj->product_name.' ';
                echo '<strong>Price</strong>: '.$currency.$obj->price.'  ';
                echo '<strong>Number of Units </strong>: '.$obj->units.'    ';
                echo '<strong>Cost </strong>: '.$currency.$obj->total.'     ';
                 echo '<strong>Order Product ID </strong>: '.$obj->order_product_id.'     ';

                $big_total += $obj->total ; 
                }
                else{
                     echo '<strong>Product Name</strong>: '.$obj->product_name.' ';
                echo '<strong>Price</strong>: '.$currency.$obj->price.'  ';
                echo '<strong>Number of Units </strong>: '.$obj->units.'    ';
                echo '<strong>Cost </strong>: '.$currency.$obj->total.' ';
                echo '<strong>Order Product ID </strong>: '.$obj->order_product_id.'     ';


                $big_total += $obj->total ; 
                }
                
                $current_date = $obj->date;  
                
                   
                echo ' <hr>';


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
