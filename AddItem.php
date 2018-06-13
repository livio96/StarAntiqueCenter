<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
?>

<html>

    
<head>
    
</head>
    
<body>

    <p > <strong><center> Enter some information about the new item</center></strong> </p>
    <form action="AddItem.php" method="post"> 
    <br/><br/><br/>
    <strong><p style="position:absolute; top:35px;"> Enter Product ID :</p></strong>
    <input style=" width:20%; position:absolute; top:50px; left:150px; " name="enter_id" type="text" size="40" >
    <br/>
    <strong>Enter Product Name :</strong>
    <input style=" width:20%; position:absolute; top=100px; " name="enter_p_name" type="text" size="40" >
    <br/><br/>
    <strong>Enter Product Code:</strong> <input style=" width:20%;  " name="enter_productcode" type="text" size="40">
    <br />
    <br/><br/>
    <strong>Enter Product Description:</strong> <input style=" width:20%;  " name="enter_product_desc" type="text" size="40">
    <br />
    <br/><br/>
    <strong>Enter Product Quantity:</strong> <input style=" width:20%;  " name="enter_product_qty" type="text" size="40">
    <br />
    <br/><br/>
    <strong>Enter Product Price:</strong> <input style=" width:20%;  " name="enter_product_prc" type="text" size="40">
    <br />
     <br/><br/>
    <strong>Enter Image Name: </strong><input style=" width:20%;  " name="enter_img_name" type="text" size="40">
    <br />
    <input style=" position:absolute; top:440px; left:350px; font-size:60px;" type="submit" name="submit_up_button" value="Insert Item">
  </form>
    
    
   

    
    
</body>


</html>


<?php

$flag = 0 ; 

$currency = '$';
$db_username = 'root';
$db_password = '';
$db_name = 'Antiques';
$db_host = 'localhost';

$prod_id = "" ; 
$prd_name = "" ; 
$pr_cd = "" ; 
$prod_description = "" ; 
$prod_quant = 0 ; 
$product_pr=0 ; 
$img_name = "" ; 


if (isset($_POST['submit_up_button'])) 
$prod_id=$_POST['enter_id'];

if (isset($_POST['submit_up_button'])) 
$prd_name=$_POST['enter_p_name'];


if (isset($_POST['submit_up_button'])) 
$pr_cd=$_POST['enter_productcode'];

if (isset($_POST['submit_up_button'])) 
$prod_description=$_POST['enter_product_desc'];

if (isset($_POST['submit_up_button'])) 
$prod_quant=$_POST['enter_product_qty'];

if (isset($_POST['submit_up_button'])) 
$product_pr=$_POST['enter_product_prc'];

if (isset($_POST['submit_up_button'])) 
$img_name=$_POST['enter_img_name'];

if (isset($_POST['submit_up_button'])) 
$flag= 1 ; 



// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO products (id, product_code, product_name, product_desc, product_img_name, qty, price)
VALUES ('$prod_id', '$pr_cd', '$prd_name', '$prod_description', '$img_name', '$prod_quant', '$product_pr')";

if ($conn->query($sql) === TRUE and $flag===1) {
    echo "<p style='color:green; '> New record created successfully </p>";
    $flag = 0 ; 
    
} 

    echo '<a href="index.php">Back to Main Page</a>';


/*else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} */

$conn->close();
?>