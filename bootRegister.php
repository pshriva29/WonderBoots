


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
  


  <title>Bootstrap Theme Company</title>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="drafts1.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="boot.css" />
      
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
        <li><a href="mylogin.html">Login</a></li>
        <li><a href="mybag.html">My Bag</a></li>
    
      </ul>
    </div>
  </nav>
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
        <li><a href="homePage1.html">Home</a></li>
        <li><a href="men.html">Men</a></li>
        <li><a href="women.html">Women</a></li>
        <li><a href="kids.html">Kids</a></li>
      </ul>
    </div>
  </nav>

   <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

 
<h1> Welcome to Registration Page</h1>
<br>
<br>
<div style="text-align:center">
<form name="register"  method="POST" action="phpreg.php" > 

<p><span style="color:blue"> All fields are required!</span></p>
<label>First name: </label> <input type="text" name="first_name" required="required"  >

<br>

<label>Last name:</label>  <input type="text" name="last_name" required="required" >

<br>

<label>Email Address: </label> <input type="email" name="emailaddress" required="required"  >

<br><br>

<p><span style="color:blue">Password Must be atleast 6 characters long! </span></p>
<label>Password:</label>

<input type="password" name="password" required="required" minlength="6" maxlength="12" id="password" >

<br>

<label>Confirm Password:</label>  <input  type="password" maxlength="12" minlength="6" name="password" required="required"  id="password_confirm" oninput="check(this)" value="" class="">

<br><br>

  <input type="Submit"  value="Register" onclick="msg(this);" >
  <input type="reset"  value="Reset">


<?php
  $error = $_GET['err'];
  if($error==1)
  {
      echo "<div>
             <p>Email id already registered</p>
             </div>";
  }
  ?>


  <script>
function msg(input) {
  if(this)
  {
  alert("Registered successfully");
    
  }
  window.location.assign("homePage.html");
}
   
}
</script>

                     
<script type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>
</form>


    <br>
    <br><br><br><br>
    
   <nav id="bottombar" class="navbar navbar-default">
    <div class="container-fluid">
     
      <ul class="nav navbar-nav navbar">
        <li><a href="aboutUs.html">About Us</a></li>
        <li><a href="contactUs.html">Contact Us</a></li>
      </ul>
    </div>
  </nav>
  <footer>
    <div id="footer">
      <br>
      <p>&copy; 2016 WonderBoots.com. All rights reserved.</p>
    </div>
  </footer>
</div>
</body>
</html>