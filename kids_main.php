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
        <li><h3>Categories</h3></li>
		<li><h4><a href="category.php?category=9">Infants</a></h4></li>
		<li><h4>Girls</h4></li>
        <li><a href="category.php?category=10">Sandals</a></li>
        <li><a href="category.php?category=11">Boots</a></li>
        <li><a href="category.php?category=12">Socks</a></li>
		<li><h4>Boys</h4></li>
		<li><a href="category.php?category=13">Sneakers</a></li>
        <li><a href="category.php?category=14">Boots</a></li>
      </ul>
    </div>
    <div class="col-md-9  rowstyle">
      <div class="row">
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=50">
            <img src="Images/infants/infants1.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$34.50
          </div>

        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=59">
            <img src="Images/girls/boots2.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$27.87
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=70">
            <img src="Images/boys/sneakers5.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$43.45
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=64">
            <img src="Images/socks/socks3.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$42.54
          </div>
        </div>
      </div>
      <br><br>

      <div class="row">
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=57">
              <img src="Images/girls/sandals4.jpg" alt="Image">
            </a>
            
          </div>
          <div class="itemdetails">
            Price:$38.75
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=61">
            <img src="Images/boys/boots4.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$41.43
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=52">
            <img src="Images/infants/infants3.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$38.75
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="itemDetails.php?product_id=67">
            <img src="Images/boys/sneakers2.jpg" alt="Image">
            </a>
          </div>
          <div class="itemdetails">
            Price:$35.76
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