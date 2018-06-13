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

<form action="DeleteItem.php" method="post"  style="position:absolute; top:200px; left:400px; ">
    Enter the code of the item you want to delete:<br />
    <input style=" width:80%; position:absolute; top=100px; " name="enter_product_code" type="text" size="40">
    <br />
    <input style=" position:absolute; top:30px; left:280px;" type="submit" name="submit_delete_button" value="Delete">
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
$flag= 0 ; 

if (isset($_POST['submit_delete_button'])) 
$p_code=$_POST['enter_product_code'];

if (isset($_POST['submit_delete_button'])) 
$flag=1; 



$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM products WHERE product_code='" . $p_code . "'";
    


if ($conn->query($sql) === TRUE and $flag===1) {
    echo "<p style='color:green; '> Item deleted successfully!   </p>";
    $flag = 0 ; 
} elseif ($conn->query($sql) === FALSE ){
    echo "<p style='color:red; '> Item could not be deleted </p>" ;
}

echo '<a href="index.php">Back to Main Page</a>'; 

mysqli_close($conn);
?>