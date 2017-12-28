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
         <?php
//$_SESSION["userid"] = "Pragati";
//$_SESSION['userid'] = 1;


$host = "localhost";
$database = "db_Fall16_pshrivastava";
$user = "pshrivastava";
$pass = "pshrivastava";

$connection = mysqli_connect($host,$user,$pass, $database);

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
} 


$userid = $_SESSION["userid"];

//echo $userid;

//$sql = "SELECT * FROM db_Fall16_pshrivastava.product_details WHERE category_id = '$category'";

$sql = "SELECT count(1) as count FROM db_Fall16_pshrivastava.my_bag1 WHERE user_id = '$userid'";

//echo $sql;

if ($result = mysqli_query($connection,$sql))
{
  $row_num= mysqli_num_rows($result);

    /* May have to add loops for adding rows if more than 4 rows return*/

  $row=mysqli_fetch_array($result,MYSQL_ASSOC);

  $count = $row["count"];

  echo "<li><a href='myBag_test.php'>My Bag(".$count.")</a></li>";

   mysqli_free_result($result);

}

else{
    die('Invalid Query:'.mysqli_error($connection));
}

mysqli_close($connection);


if($userid)
{
echo "<li><a href='logout.php'>Logout</a></li>";
}

else
{
echo "<li><a href='mylogin.php'>Login</a></li>";
}

?>
        
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

    $connection = mysqli_connect($host,$user,$pass,$database);
    if (mysqli_connect_errno()) {
        die(mysqli_connect_error());
    } 

/*Adding for insert from itemdetails page*/

   $product_id = $_GET['product_id'];
   $size = $_GET['size'];
   $userid = $_SESSION["userid"];

   $sql1 = "SELECT * FROM db_Fall16_pshrivastava.product_details where product_id = '$product_id'";
   
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
 
    
    $sql2 = "INSERT INTO db_Fall16_pshrivastava.my_bag1 (user_id, product_id,image,product_name,size,price)
VALUES ($userid,$product_id,'$image','$productname',$size,$price)";



        $result1 = mysqli_query($connection,$sql2);
            
            if(!$result1) {
               die('Could not enter data: ' . mysqli_error($conn));
            }

            else
            {
                echo "Product added to the cart successfully";
            }

      ?>

      <div class="shopping">
	<form><input type="button" class="btn btn-primary btn-sm pull-right" value="Continue Shopping" onClick="next();"></form>
	<h3><strong>Shopping Bag</strong></h3>
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
		<div class="col-md-2">
			<h4><strong>Delete item(s)</strong></h4>
		</div>	
	</div>


     <?php      

$sql = "SELECT * FROM db_Fall16_pshrivastava.my_bag1 where user_id = '$userid'";



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
                            <button type='submit'>Delete</button>
                        </form> 
                    </div>
                    </div>";
        }
    mysqli_free_result($result);
    echo "<div class='row'>
		    <div class='col-md-9 col-xs-12 text-right'>
			    <h4><strong>Subtotal ".$rowcount." item(s): ".$sum." </strong></h4>
		    </div>
            <div class='col-md-3 col-xs-12'>
			<form>
				<input type='button' class='btn btn-primary btn-sm' value='Checkout' onClick='checkout();'>
			</form>
		</div>

        </div>";
        if($rowcount == 0)
        {
            echo "Your bag is empty";
        }
    }
    else
    {
        die("Invalid Query:".mysqli_error($connection));
    }
    //echo $_POST["id"];
    function someFunction()
    {
        return true;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'DELETE' || ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['_METHOD'] == 'DELETE')) 
    {
        //echo "I'm hit";
        $id = (int) $_POST['id'];
        //echo "$id";
        $myquery = "DELETE FROM db_Fall16_pshrivastava.my_bag1 WHERE bag_id='$id'";
        $res = mysqli_query($connection,$myquery);
        //echo "$res";
        if ($res != false) 
        {
            //echo "I'm hit inside IF";
            header("refresh:5;url=myBag_test.php");
            //print_r($_SESSION);
            exit();
        }
        else
        {
            echo "Can't delete";
        }
    }
    mysqli_close($connection);
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