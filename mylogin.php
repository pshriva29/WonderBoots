

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
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Login</a></li>
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


<h2>Welcome to Login Page</h2> 
<br>
<br>
<br>


               
            <div style="text-align:center">
            
            <form action="login2.php" method="POST" target="_blank">

<label>Email Address </label> <input type="email" name="emailaddress" required="required"  >

<br>

<label>Password</label> <input type="password" name="password" required="required" ><br>
<br>
<?php
  $error = $_GET['err'];
  if($error==1)
  {
      echo "<div>
             <p>Userid or password is wrong</p>
             </div>";
  }
  ?>
<br>
<input type="submit" value="Login" >
<br>
<br>
<br>

                <p><span style="color:blue">Do not have an account?</span></p>

               <a href="bootRegister.php">Create  an Account </a>
            </form>  
         
  
   
   <br>
   <br>
   <br>
   <br>
   <nav id="bottombar" class="navbar navbar-default">
    <div class="container-fluid">
    
          <ul class="nav navbar-nav navbar">
        <li><a href="aboutUs.html"> About Us</a></li>
        <li><a href="contactUs.html"> Contact Us</a></li>
      </ul>
      </div>
      </nav>
  <footer>
  
    <div id="footer" >
      <br>
      <p>&copy; 2016 WonderBoots.com. All rights reserved.</p>
    </div>
    
  </footer>
   <br>
</div>

</body>
</html>
