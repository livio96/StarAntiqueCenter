<?php




//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}

include 'config.php';
include 'password_recovery.php' ; 

$db_username = 'root';
$db_password = '';
$db_name = 'Antiques';
$db_host = 'localhost';

//Connect to the database ; 
$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];  

$sql = "UPDATE users SET password = '$pwd' WHERE email='$email'" ; 
$flag = 'false' ; 


//Check connection, and make sure changes were made
if ($conn->query($sql) === TRUE )
{
	$flag = 'true' ; 
}

//If account was created, go back to log in page; 
if($flag =='true') {
    header ("location:index.php");

}

else {
echo '<h3 style="color:red">Something went wrong. New account could not be created! Please try again later</h3>' ; 
}

?>
