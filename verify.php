<?php
ob_start();
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$username = $_POST["username"];
$password = $_POST["pwd"];
$flag = 'false';



$result = $mysqli->query('SELECT id,email,password,fname,type from users order by id asc');

if($result === FALSE){
  die(mysql_error());
}


//Using password_verify built-in function to verify the password. 

if($result){
  while($obj = $result->fetch_object()){
    if($obj->email === $username && $obj->password === $password) {

      $_SESSION['username'] = $username;
      $_SESSION['type'] = $obj->type;
      $_SESSION['id'] = $obj->id;
      $_SESSION['fname'] = $obj->fname;
      $flag = 'true' ; 
    } 
    
    if($flag == 'true') index_redirect();  
    
   
  }
  
  if($flag=='false') {
      redirect() ;
    }
}

function redirect() {
header("location:invalid_login.php");
}

function index_redirect() {
    header("location:index.php");

}


?>
