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
    <title>My Orders || STAR ANTIQUE CENTER</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">STAR ANTIQUE CENTER</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li class="active"><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>




    <div class="row" style="margin-top:10px;">
      <div class="large-12">
        <h3>My Orders</h3>
        <hr>
          
          
        <?php
          $user = $_SESSION["username"];
          $result = $mysqli->query("SELECT * from orders where email='".$user."' Order by date DESC");
          
          $big_total = 0 ; 
          $current_date = "" ;
          $previous_date = "";
          $first_flag =0 ; 
          
          if($result) {
            while($obj = $result->fetch_object()) {
                $current_date = $obj->date; 
                
                //Display the time/date and order id of the most recent order
                //This statements gets executed only once during the loop iteration
                if($first_flag==0) {
                    echo '<p style="color:red;" align="center"; ><strong>ORDER ID : </strong>'.$obj->order_id.' </p>';  
                    echo '<p style="color:green;" align="center";><strong>Purchase Date</strong>: '.$obj->date.'</p>';
                    $first_flag=1; 
                }

                //If there is a change in date, then display the next order. 
                //NOTE* All orders are listed based on different time/date they were placed
                if($previous_date > $current_date)  {
                    echo '<p style="color:orange";><strong> Order Total :  </strong>'.$currency.$big_total.'</p>' ; 
                    $big_total = 0 ;
                    echo '<p> <hr></p>';
                    echo '<p style="color:red;" align="center"; ><strong>ORDER ID : </strong>'.$obj->order_id.' </p>';  
                    echo '<p style="color:green;" align="center";><strong>Purchase Date</strong>: '.$obj->date.'</p>';
                }
            
                echo '<strong>Product Name</strong>: '.$obj->product_name.' ';
                echo '<strong>Price</strong>: '.$currency.$obj->price.'  ';
                echo '<strong>Number of Units </strong>: '.$obj->units.'    ';
                echo '<strong>Cost </strong>: '.$currency.$obj->total.'     ';
               

                $big_total += $obj->total ; 
                
                   
                $previous_date = $current_date;  
                echo ' <hr>';


            }
               //When the loop terminates, display the grand total of the very first order
              //placed by client. 
               echo '<p style="color:orange";><strong> Order Total :  </strong>'.$currency.$big_total.'</p>' ;

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
