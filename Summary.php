<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Wonder Boots</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="drafts1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="remove.js"></script>

   <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
<style>
.row{
    padding-bottom: 2mm;
}
</style>
</head>

<body>
  <nav id="topbar" class="navbar navbar-default">
    <div class="container-fluid">
      <ul class="nav navbar-nav navbar-right">


       <li><a href='myBag_test.php'>My Bag(0)</a></li><li><a href='mylogin.php'>Logout</a></li> 
        
      </ul>
    </div>
  </nav>

  <!--Logo and Heading -->
	<div class="container logo">
	<div class="row">
    <div class="col-md-4">
        <img src="Images/Logo.jpg" alt="logo" />
    </div>
    <div class="col-md-8">
        <h1>Wonder Boots</h1>
    </div>
</div>
</div>

<nav id="sectionbar" class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a href="homePage.php">Home</a></li>
            <li><a href="men_main.php">Men</a></li>
            <li><a href="women_main.php">Women</a></li>
            <li><a href="kids_main.php">Kids</a></li>
        </ul>
    </div>
</nav>
<br>

    <?php
    $host = "localhost";
    $database = "db_Fall16_pshrivastava";
    $user = "pshrivastava";
    $pass = "pshrivastava";
$taxes="2.85";
$discount="0.10";

    $connection = mysqli_connect($host,$user,$pass,$database);
    if (mysqli_connect_errno()) {
        die(mysqli_connect_error());
    } 

/*Adding for insert from itemdetails page*/

   $product_id = $_GET['product_id'];
   $size = $_GET['size'];
   $userid = $_SESSION["userid"];

   $sql1 = "SELECT * FROM db_Fall16_pshrivastava.my_bag1 where user_id = '$userid'";
   
   if ($result = mysqli_query($connection,$sql1))
    {
        $rowcount = mysqli_num_rows($result);
        while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
        {
          $image = $row["image"];
          $price = $row["price"];
          $name = $row["product_name"];

         }
    mysqli_free_result($result);

    }
    else
    {
        die("Invalid Query:".mysqli_error($connection));
    }

    $productname = mysqli_real_escape_string($connection, $name);

  // $product_name = addslashes ($name);
 //  $tutorial_author = addslashes ($_POST['tutorial_author']);
 
    
 
         ?>

      <div class="shopping">
	<form><input type="button" class="btn btn-primary btn-sm pull-right" value="Continue Shopping" onClick="next();"></form>
	<h3><strong>Shopping Summary</strong></h3>
</div>
<div class="container">
<div class="box">
	<div class="row">
		<div class="col-md-6">
			<h4><strong>Product Details</strong></h4>
		</div>
		<div class="col-md-2">
			<h4><strong>Price</strong></h4>
		</div>
		<div class="col-md-2">
			<h4><strong>Size</strong></h4>
		</div>
		
	</div>


     <?php      

$sql = "SELECT * FROM db_Fall16_pshrivastava.my_bag1";

   if ($result = mysqli_query($connection,$sql))
    {
        $rowcount = mysqli_num_rows($result);
        while($row=mysqli_fetch_array($result,MYSQL_ASSOC))
        {
            $sum += $row["price"]; 
            echo "<div class='row'>
            		<div class='col-md-6 item_info'>
                        <a href='itemdetails.html'>
                        <h4><strong>".$row["product_name"]."</strong></h4>
                        <img src='Images/".$row["image"]."' alt='Image'></a>
                    </div>
                    <div class='col-md-2'>
                        <h4>".$row["price"]."</h4>
                    </div>
                    <div class='col-md-2'>
                        <h4>".$row["size"]."</h4>
                    </div>
                    <div class='col-md-2 col-xs-2'>
                        <form method='POST' onsubmit='return someFunction();'>
                            <input type='hidden' name='_METHOD' value='DELETE'>
                            <input type='hidden' name='id' value='".$row["bag_id"]."'>
                      
                        </form> 
                    </div>
                    </div>";
        }
    mysqli_free_result($result);

$total=$sum+$taxes+$discount;
    echo "<div class='row'>
		    <div class='col-md-9 col-xs-12 text-right'>
			    <h4><strong>Subtotal ".$rowcount." item(s): ".$sum." </strong></h4>
          <h4><strong>Taxes ".$taxes."</strong></h4>
          <h4><strong>Discount ".$discount."</strong></h4>
          <h4><strong>Total Price ".$total."</strong></h4>
		    </div>
            <div class='col-md-3 col-xs-12'>
					</div>

        </div>";

        if($rowcount == 0)
        {
            echo "Your shopping bag is empty";
        }
    }
    else
    {
        die("Invalid Query:".mysqli_error($connection));
    }
    //echo $_POST["id"];
    ?>
</div>
</div>
<br><br><br><br>
<nav id="bottombar" class="navbar navbar-default">
    <div class="container-fluid">
    <ul class="nav navbar-nav navbar">
         <li><a href="aboutUs.html">About Us</a></li>
         <li><a href="contactus.html">Contact Us</a></li>
    </ul>
    </div>
</nav>
<footer>
<div id="footer">
      <br>
      <p>&copy; 2016 WonderBoots.com. All rights reserved.</p>
</div>
</footer>
</body>

</html>