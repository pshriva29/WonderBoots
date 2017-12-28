<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Wonder Boots</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="homePage.css">
	  <!--<link rel="stylesheet" href="drafts1.css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="itemDetails.js"></script>
		<script src="remove.js"></script>	
</head>
<body>
<nav id="topbar" class="navbar navbar-default">
    <div class="container-fluid">
      <!--
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    -->
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

  <!--<div class="heading">
		<img src="Logo (2).JPG" alt="random"><h1>Wonder Boots</h1>
  </div>-->
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


	<h2 id="subHeading1">TRENDY</h2>
	<!--<div class="jumbotron">-->
	<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="thumbnail">
				<a href="category.php?category=7"><img src="Images/men/sneaker2.jpg" alt="random"></a>
				<h4>Price: $39.95</h4>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail">
				<a href="category.php?category=6"><img src="Images/men/athletic6.png" alt="random"></a>
				<h4>Price: $69.95</h4>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail">
				<a href="category.php?category=11"><img src="Images/boys/boots4.jpg" alt="random"></a>
				<h4>Price: $41.43</h4>
			</div>
		</div>
	</div>
	</div>
	<!--</div>-->
	<h2 id="subHeading2">EXPLORE MORE</h2>
	<!--<div class="jumbotron">-->
	<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="thumbnail">
				<a href="category.php?category=10"><img src="Images/girls/sandals4.jpg" alt="random"></a>
				<h4>Price: $38.75</h4>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail">
				<a href="category.php?category=3"><img src="Images/women/heels1.jpeg" alt="random"></a>
				<h4>Price: $59.95</h4>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail">
				<a href="category.php?category=12"><img src="Images/socks/socks1.jpg" alt="random"></a>
				<h4>Price: $40.29</h4>
			</div>
		</div>
	</div>
	</div>
	<!--</div>-->
	<br><br><br><br>
	<nav id="bottombar" class="navbar navbar-default">
    <div class="container-fluid">
      <!--
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    -->
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