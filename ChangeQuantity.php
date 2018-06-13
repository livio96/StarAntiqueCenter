<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'config.php';
?>


<html>
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

<body style="background-color:azure; ">

<!-- Start Header Area -->
			<header class="default-header">
				<div class="menutop-wrap">
					<div class="menu-top container">
						<div class="d-flex justify-content-between align-items-center">
							<ul class="list">
         <?php 

          if(isset($_SESSION['username']) ){
            echo '<li><a href="index.php">Home</a></li>';
            echo '<li><a href="admin.php">Products</a></li>';
            echo '<li><a href="DeleteItem.php">Delete an item</a></li>';
            echo '<li><a href="DeleteOrder.php">Delete an order</a></li>';
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
<form action="ChangeQuantity.php" method="post"  style="position:absolute; top:200px; left:300px;">
    Enter Product Code:<br />
    <input style=" width:100%; position:absolute; top=100px; " name="pr_code" type="text" size="40">
    <br/><br/>
    New Quantity: <input style=" width:100%; position:absolute; top=100px; " name="new_qty" type="text" size="40">
    <br />
    <input style=" position:absolute; top:60px; left:350px;" type="submit" name="update_button" value="Update">
  </form>
    
</body>


</html>


<?php
$currency = '$';
$db_username = 'root';
$db_password = '';
$db_name = 'Antiques';
$db_host = 'localhost';


include 'config.php' ; 
 
$p_code = "" ; 
$new_qty = 0 ; 
$flag = 0 ; 

if (isset($_POST['update_button'])) 
$p_code=$_POST['pr_code'];
    
if (isset($_POST['update_button'])) 
$flag=1;  


if (isset($_POST['update_button']))
    $new_qty = $_POST['new_qty'];



// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$result = "UPDATE products 
                      SET qty =  '$new_qty'
                      WHERE product_code = '$p_code'";
                      
                      
if ($conn->query($result) === TRUE and $flag===1) {
    echo "<p style='color:green; '> Product Quantity was Successfully updated! </p>";
    $flag = 0 ; 
} elseif ($conn->query($result) === FALSE ){
    echo "<p style='color:red; '> Product Quantity could not be updated </p>" ;
}

echo '<a href="index.php">Back to Main Page</a>'; 


$conn->close();
?>