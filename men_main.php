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
   <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->
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
    <div class="col-md-7">
        <h1>Wonder Boots</h1>
    </div>
    <div class="col-md-1">

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

  <div class="container">
    <div class="col-md-3 rowstyle">
      <ul class="nav nav-pills nav-stacked">
        <li>
          <h3>Categories</h3>
        </li>
        <li><a href="category.php?category=5">Dress Boots</a></li>
        <li><a href="category.php?category=6">Athletic</a></li>
        <li><a href="category.php?category=7">Sneakers</a></li>
        <li><a href="category.php?category=8">Flip Flops</a></li>
      </ul>
    </div>
    <div class="col-md-9  rowstyle">
      <div class="row">
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=25">
            <img src="Images/men/shoes1.png" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$108.95
          </div>

        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=26">
            <img src="Images/men/shoes2.png" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$105.95
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=44">
            <img src="Images/men/flip1.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$29.95
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=45">
            <img src="Images/men/flip2.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$19.94
          </div>
        </div>
      </div>
      <br><br>

      <div class="row">
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=32">
              <img src="Images/men/athletic1.png" alt="Image">
            </a>
            
          </div>
          <div class="itemdetails">
            Price:$84.95
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=33">
            <img src="Images/men/athletic2.png" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$74.95
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=38">
            <img src="Images/men/sneaker1.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$59.95
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=40">
            <img src="Images/men/sneaker2.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$39.95
          </div>
        </div>
      </div>
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