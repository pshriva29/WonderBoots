<?php
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

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
  
     <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<![endif]-->

<script type="text/javascript">
var foo="<?php echo $_SESSION['userid']; ?>";
var val = "<?php echo $product_id ?>";

function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}

var id = getQueryVariable("product_id");


/* anonymous function to get the id*/
var $ = function (id) {
    return document.getElementById(id);
}


function validateBag() {
    var sizeSelected = document.getElementById('sizeSelected').value;
  //added to check object on local storage  
  //shoppingBag.size = sizeSelected;
 //   console.log('printing size', sizeSelected);



    if (sizeSelected == "select") {
    $("message").innerHTML = "Please select size";
        
    }

    else if (!foo)
    {
        $("message").innerHTML = "Please Login";
    }

    else {
    //    localStorage.setItem('bagQuantity', JSON.stringify(shoppingBag));
        $("addToBag").action = "myBag_test3.php?product_id="+id+"&size="+sizeSelected;
        document.getElementById("addToBag").submit();
    }
}
</script>

</head>

<body>
    <nav id="topbar" class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">

<?php



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

//mysqli_close($connection);


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

    <div id="detailscontainer" class="container">
         <div class="col-md-3">
            


<?php


$category_id = $_GET['category'];



$product_id = $_GET['product_id'];

$sql2 = "SELECT * FROM db_Fall16_pshrivastava.product_details WHERE product_id = '$product_id'";

//$sql2 = "select category_id from db_Fall16_pshrivastava.product_details where product_id = '$product_id'";

//echo "Sql is". $sql2 ;



if ($result2 = mysqli_query($connection,$sql2))
{
  $row_num= mysqli_num_rows($result2);

    /* May have to add loops for adding rows if more than 4 rows return*/

  while($row2=mysqli_fetch_array($result2,MYSQL_ASSOC))
    {
        /*
         $image_addr = 'Images/'.$row["image"];
         echo $image_addr;
        */
         
         echo "<div id='details' class='thumbnail'>
                <img src='Images/".$row2["image"]."' alt='Image'>
            </div>
        </div>
        <div class='col-md-5'>
            <div id='detailrow' class='row'>
                <h2>".$row2["product_name"]."</h2> 
                <p class='price'>Price: $".$row2["price"]."</p>
                <ul>
                    <li>".$row2["desc_1"]."</li>
                    <li>".$row2["desc_2"]."</li>
                    <li>".$row2["desc_3"]."</li>
               </ul>";

           //   <img src='Images/".$row["image"]."' alt='Image'>
           //   <div class='itemdetails'>".$row["price"]."</div>

      
            ?>


         </div>
        </div>
        <div id="bag" class="col-md-3">
            <div>
                <form name="addToBag" id="addToBag" method="POST" >
                    <div class="box">
                        <div>
                            <div>
                                <label>Please select the size</label>
                            </div>
                            <div>
                                <select id="sizeSelected">
                                  <option id="select" value="select">Select</option>


 <?php


                     if($row2["category_id"]==1 || $row2["category_id"]==2 || $row2["category_id"]==3 || $row2["category_id"]==4) //Women
                     {
                         for($count=5;$count<12;$count++)
                         echo "<option value = ".$count."> $count</option>";
                         
                     }

                     elseif ($row2["category_id"]==5 || $row2["category_id"]==6 || $row2["category_id"]==7 || $row2["category_id"]==8) //Men
                     {
                         for($count=7;$count<15;$count++)
                         echo "<option value = ".$count."> $count</option>";
                     }

                     elseif ($row2["category_id"]==9) {   //Infants
                         for($count=1;$count<3;$count++)
                         echo "<option value = ".$count."> $count</option>";
                     }

                     elseif ($row2["category_id"]==10 || $row2["category_id"]==11 || $row2["category_id"]==12 ) {    //Girls
                         for($count=3;$count<5;$count++)
                         echo "<option value = ".$count."> $count</option>";
                     }

                     elseif ($row2["category_id"]==13 || $row2["category_id"]==14 ) {           //Boys
                         for($count=3;$count<7;$count++)
                         echo "<option value = ".$count."> $count</option>";
                     }
                     



                                   
           
  
    }
   mysqli_free_result($result2);

}

else{
    die('Invalid Query:'.mysqli_error($connection));
}

mysqli_close($connection);


?>


                               </select>
                            </div>
                            <br><br>
                        </div>
                        <div>
                            <input type="button" class="btn btn-warning" onclick="validateBag()"  value="Add to Bag">
                            <br><br>
                            <p id="message"></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
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