<html>
<head>
</head>
<body>
<h1> Search Results</h1>
<?php
    
  include 'config.php' ;
  // create short variable names
  $searchterm=trim($_POST['searchterm']);

  if (!$searchterm) {
     echo 'You have not entered search details.  Please go back and try again.';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $searchterm = addslashes($searchterm);
  }
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    //This is just an alternative way to create a db variable ; 
    //@ $db = new mysqli('localhost', 'root', '', 'Antiques');

  if (mysqli_connect_errno()) {
     echo 'Error: Could not connect to database.  Please try again later.';
     exit;
  }

  $query = "select * from products where product_name like '%".$searchterm."%'";
  $result = $mysqli->query($query);
    
    while($obj = $result->fetch_object()) { 
    echo '<p><h3>'.$obj->product_name.'</h3></p>';
    echo '<img src="images/products/'.$obj->product_img_name.'"/>';
    echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
    echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
    echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
    echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';
        
    //Add to cart option will be displayed too. 
     if($obj->qty > 0){
                echo '<p><a href="update-cart.php?action=add&id='.$obj->id.'"><input type="submit" value="Add To Cart" style="clear:both; background: #0078A0; border: none; color: #fff; font-size: 1em; padding: 10px;" /></a></p>';
              }
              else {
                echo 'Out Of Stock!';
              }
              echo '</div>';

              $i++;
    echo '<hr>' ; 
        
    
  }

   
  $mysqli->close();

?>
</body>
</html>
