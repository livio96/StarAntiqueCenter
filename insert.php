<?php




//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}

include 'config.php';

$currency = '$';
$username = 'root';
$password = '';
$dbname = 'Antiques';
$servername = 'localhost';


//Connect to the database ; 
$conn = mysqli_connect($servername, $username, $password, $dbname);

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];  

//Encrypt password before storing it to the db. 
//$hashed_password = password_hash($_POST['pwd'], PASSWORD_BCRYPT);
//$hashed_password = substr( $hashed_password, 0, 60 );

$flag = 'false' ; 
$sql = "INSERT INTO users (fname, lname, address, city, pin, email, password) VALUES('$fname', '$lname', '$address', '$city', $pin, '$email', '$pwd')" ; 


//Check connection, and make sure changes were made
if ($conn->query($sql) === TRUE )
{
	$flag = 'true' ; 
}

//If account was created, go back to log in page; 
if($flag =='true') {
    header ("location:Registration_Success.php");

}

else {
echo '<h3 style="color:red">Something went wrong. New account could not be created! Please try again later</h3>' ; 
}

?>
