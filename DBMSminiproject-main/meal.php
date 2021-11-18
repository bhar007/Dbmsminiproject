<?php
if(isset($_POST['name'])){
  $server = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbms";
  $con = mysqli_connect($server,$username,$password,$dbname);
  if(!$con)
  {
    die("Connection to this database failed due to ".mysqli_connect_error());
  }

  $name  = $_POST['name'];
  $price = $_POST['price'];
  $chefid  = $_POST['chefid'];
  $sql = "INSERT INTO `meal` (`NAME`, `PRICE`, `chefid`) VALUES ('$name', '$price', '$chefid');";

  if($con->query($sql)==true)
  {
    echo "Successfully inserted.";
  }
  else
  {
    echo "ERROR: $sql <br> $con->error";
  }
  $con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meal</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
  <h3>ENTER Meal DETAILS</h3>
    <p>ENTER YOUR DETAILS AND SUBMIT TO CONFIRM.</p>
    <form action="meal.php" method="post">
    <input type="text" name="name" id="name" placeholder="ENTER THE NAME">
    <input type="text" name="price" id="price" placeholder="ENTER the price">
    <input type="text" name="chefid" id="chefid" placeholder="ENTER CHEFF_ID"></br>   
    </br>
    <button class='btn'>SUBMIT</button>
    <button class='btn'>RESET</button>


    </form>
    <a href="home.html" title="home page">
    <button class='btn'>BACK TO HOME</button></br></a>
  </div>
</body>
</html>