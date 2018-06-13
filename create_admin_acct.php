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
    
</head>
    
<body>

    <p > <strong><center> Enter some information </center></strong> </p>
    <form action="create_admin_acct.php" method="post"> 
    <br/><br/><br/>
    
    <strong><p style="position:absolute; top:35px;"> First Name :</p></strong>
    <input style=" width:20%; position:absolute; top:50px; left:150px; " name="admin_name" type="text" size="40" >
    <br/>
    <strong> Last Name :</strong>
    <input style=" width:20%; position:absolute; top=100px; " name="admin_lname" type="text" size="40" >
    <br/><br/>
    <strong>Address:</strong> <input style=" width:20%;  " name="admin_addr" type="text" size="40">
    <br />
    
    <br/><br/>
    <strong>City:</strong> <input style=" width:20%;  " name="admin_city" type="text" size="40">
    <br />
    
    
    <br/><br/>
    <strong>ZIP:</strong> <input style=" width:20%;  " name="admin_zip" type="text" size="40">
    <br />
    <br/><br/>
    <strong>Enter Email:</strong> <input style=" width:20%;  " name="admin_email" type="text" size="40">
    <br />
    <br/><br/>
    <strong>Password:</strong> <input style=" width:20%;  " name="admin_password" type="text" size="40">
    <br />
     <br/><br/>
   
    <input style=" position:absolute; top:440px; left:350px; font-size:60px;" type="submit" name="create_account" value="Create Account">
  </form>
    
    
   

    
    
</body>


</html>


<?php

$flag = 0 ; 


$currency = '$';
$username = 'beqiril1_admin';
$password = 'liviobeqiri';
$dbname = 'beqiril1_Antiques';
$servername = 'localhost';

$admin_name = "" ; 
$admin_lname = "" ; 
$admin_addr = "" ;
$admin_city = ""; 
$admin_zip = 0 ; 
$admin_email = "" ; 
$admin_password="" ; 
$form_type = "admin" ; 


if (isset($_POST['create_account'])) 
$admin_name=$_POST['admin_name'];

if (isset($_POST['create_account'])) 
$admin_lname=$_POST['admin_lname'];


if (isset($_POST['create_account'])) 
$admin_addr=$_POST['admin_addr'];

if (isset($_POST['create_account'])) 
$admin_zip=$_POST['admin_zip'];

if (isset($_POST['create_account'])) 
$admin_email=$_POST['admin_email'];


if (isset($_POST['create_account'])) 
$admin_city=$_POST['admin_city'];

if (isset($_POST['create_account'])) 
$admin_password=$_POST['admin_password'];

if (isset($_POST['create_account'])) 
$flag= 1 ; 



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "INSERT INTO users (fname, lname, address, city, pin, email, password, type)
VALUES ('$admin_name', '$admin_lname', '$admin_addr', '$admin_city', '$admin_zip', '$admin_email', '$admin_password', 'admin')";


if ($conn->query($sql) === TRUE and $flag===1) {
    echo "<p style='color:green; '> New account created successfully </p>";
    $flag = 0 ; 
} 
elseif ($conn->query($sql) === FALSE and flag===0 ){
    echo "<p style='color:red; '> Account could not be created. Try Again!!! </p>" ;
}


    echo '<a href="index.php">Back to Main Page</a>';

$conn->close();
?>