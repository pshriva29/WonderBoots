<?php
// Start the session
session_start();
?>

<?php

// include 'connect.php';
$host = "localhost";
$database = "db_Fall16_pshrivastava";
$user = "pshrivastava";
$pass = "pshrivastava";

$connection = mysqli_connect($host,$user,$pass, $database);

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
} 


if (isset($_POST['emailaddress']) and isset($_POST['password'])){

$email = $_POST['emailaddress'];
$userpass = $_POST['password'];


}

$query = "SELECT Firstname , userid FROM db_Fall16_pshrivastava.Registration WHERE Email  = '$email' and Password = '$userpass'";


//$result=mysqli_query($connection, $sql);


$result = mysqli_query($connection, $query);

$row_num= mysqli_num_rows($result);

echo "no of row are".$row_num;

if($row_num == 0)
{
  echo "unsuucessful";
  header("Location:mylogin.php?err=1");
}

else{
echo "suucessful";
	$row=mysqli_fetch_array($result,MYSQL_ASSOC);
	

	$id = $row["userid"];
	$name = $row["Firstname"];


	 $_SESSION['userid'] = $row["userid"];
     $_SESSION['username'] = $row["Firstname"];


	header("Location:homePage.php");

}



?>
