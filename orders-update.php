<?php
ob_start() ; 
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}



//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'config.php';

if(isset($_SESSION['cart'])) {

  $total = 0;
  $order_id = rand();    // Let ID be a random integer
 

  foreach($_SESSION['cart'] as $product_id => $quantity) {

    $result = $mysqli->query("SELECT * FROM products WHERE id = ".$product_id);
    
    
    //Check if order_id already exists in the database (to avoid duplicates)
    $check_id = $mysqli->query("SELECT id FROM orders WHERE id = ".$order_id);
    while($check_id->num_rows != 0 ) {
        $order_id++;  
         $check_id = $mysqli->query("SELECT id FROM orders WHERE id = ".$order_id);
    }

    if($result){  
      if($obj = $result->fetch_object()) {


        $cost = $obj->price * $quantity;

        $user = $_SESSION["username"];
        
        $query = $mysqli->query("INSERT INTO orders (order_id, product_code, product_name, product_desc, price, units, total, email) VALUES('$order_id', '$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost, '$user')");

        if($query){
          $newqty = $obj->qty - $quantity;
          if($mysqli->query("UPDATE products SET qty = ".$newqty." WHERE id = ".$product_id)){

          }
        }



      }
    }
  }
}

unset($_SESSION['cart']);
header("location:success.php");

?>
