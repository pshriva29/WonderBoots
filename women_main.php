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


$sql = "SELECT count(1) as count FROM db_Fall16_pshrivastava.my_bag1 WHERE user_id = '$userid'";



if ($result = mysqli_query($connection,$sql))
{
  $row_num= mysqli_num_rows($result);


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

  <div class="container">
    <div class="col-md-3 rowstyle">
      <ul class="nav nav-pills nav-stacked">
        <li>
          <h3>Categories</h3>
        </li>
        <li><a href="category.php?category=1">Sandals</a></li>
        <li><a href="category.php?category=2">Boots</a></li>
        <li><a href="category.php?category=3">Heels</a></li>
        <li><a href="category.php?category=4">Athletic</a></li>
      </ul>
    </div>
    <div class="col-md-9  rowstyle">
      <div class="row">
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=13">
            <img src="Images/women/heels1.jpeg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$59.95
          </div>

        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=14">
            <img src="Images/women/heels2.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$89.00
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=8">
            <img src="Images/women/boots2.png" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$89.95
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=10">
            <img src="Images/women/boots4.png" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$104.99
          </div>
        </div>
      </div>
      <br><br>

      <div class="row">
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=4">
              <img src="Images/women/sandals4.jpg" alt="Image">
            </a>
            
          </div>
          <div class="itemdetails">
            Price:$82.00
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=2">
            <img src="Images/women/sandals2.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$49.95
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=22">
            <img src="Images/women/athletic4.png" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$60.00
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=20">
            <img src="Images/women/athletic2.png" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$52.50
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