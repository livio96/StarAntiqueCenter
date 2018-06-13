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
<h1> Search Results</h1>
<?php
    
  include 'config.php' ;
  // create short variable names
  $search_email=$_POST['search_email'];

  if (!$search_email) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  //Protect from sql injections using addslashes as indicated in 
  //Dr Herbert's slides. 
  if (!get_magic_quotes_gpc()){
    $search_email = addslashes($search_email);
  }
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

  $query = "select * from orders where email like '%".$search_email."%' or order_id like '%".$search_email."%' ";
  $result = $mysqli->query($query);
    
    
    while($obj = $result->fetch_object()) {

                //Display the time/date and order id of the most recent order
                //This statements gets executed only once during the loop iteration
                $new_date = $obj->date;   
                   
                if($new_date != $current_date) {
                echo '<h4 style="color:red;" align="center"; ><strong>ORDER ID : </strong>'.$obj->order_id.' </h4>';  
                    echo '<h4 style="color:green;" align="center";><strong>Purchase Date</strong>: '.$obj->date.'</h4>';
                echo '<h4 style="color:red;" align="center"; ><strong>Order Placed by:  </strong>'.$obj->email.' </h4>'; 
                echo '<br>'; 
            
                echo '<strong>Product Name</strong>: '.$obj->product_name.' ';
                echo '<strong>Price</strong>: '.$currency.$obj->price.'  ';
                echo '<strong>Number of Units </strong>: '.$obj->units.'    ';
                echo '<strong>Cost </strong>: '.$currency.$obj->total.'     ';
                $big_total += $obj->total ; 
                }
                else{
                     echo '<strong>Product Name</strong>: '.$obj->product_name.' ';
                echo '<strong>Price</strong>: '.$currency.$obj->price.'  ';
                echo '<strong>Number of Units </strong>: '.$obj->units.'    ';
                echo '<strong>Cost </strong>: '.$currency.$obj->total.'     ';
                $big_total += $obj->total ; 
                }
                
                $current_date = $obj->date;  
                
                   
                echo ' <hr>';


            }
               
    
   
   
  $mysqli->close();

?>
</body>
</html>
