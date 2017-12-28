<?php
// Start the session
session_start();
?>

<?php

$host="localhost";
$database="db_Fall16_pshrivastava";
$user="pshrivastava";
$pass="pshrivastava";
$id=0;
$connection=mysqli_connect($host,$user,$pass,$database);

if(mysqli_connect_errno())
{
	die (mysqli_connect_error());
}

$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$email= $_POST['emailaddress'];
$pwd=$_POST['password'];

$sql="INSERT INTO Registration(Firstname,Lastname,Email,Password) VALUES ('$fname', '$lname','$email','$pwd')";


$result=mysqli_query($connection, $sql);



if(!$result){
	echo "Not Successful";
	header("Location:bootRegister.php?err=1");

	
}
else
{
	echo "Successful";
	$qry = "SELECT Firstname ,userid FROM Registration WHERE Email  = '$email'";

 //   $row1 = mysql_fetch_array($qry);


	if ($result2 = mysqli_query($connection,$qry))
{

$row=mysqli_fetch_array($result2,MYSQL_ASSOC);

  $_SESSION['userid'] = $row["userid"];
  $_SESSION['username'] = $row["Firstname"];




   mysqli_free_result($result2);

}

else{
    die('Invalid Query:'.mysqli_error($connection));
}


    header("Location:homePage.php");

}





 
mysqli_close($connection);

?>
