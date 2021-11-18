<?php
if(isset($_POST['cid'])){
  $server = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbms";
  $con = mysqli_connect($server,$username,$password,$dbname);
  if(!$con)
  {
    die("Connection to this database failed due to ".mysqli_connect_error());
  }

  $cid  = $_POST['cid'];
  $wid = $_POST['wid'];
  $mid  = $_POST['mid'];
  $quantity = $_POST['quantity'];
  $sql = "INSERT INTO `orders` (`cid`, `wid`, `mid`, `quantity`) VALUES ('$cid', '$wid', '$mid', '$quantity');";

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
  <title>Order</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h3>ENTER ORDER DETAILS</h3>
    <p>ENTER DETAILS AND SUBMIT TO CONFIRM.</p>
    <form action="Order.php" method="post">
    <input type="number" name="cid" id="cid" placeholder="ENTER CUSTOMER ID">
    <input type="number" name="wid" id="wid" placeholder="ENTER DELIVERY BOY ID">
    <input type="number" name="mid" id="mid" placeholder="ENTER MEAL ID">
    <input type="number" name="quantity" id="quantity" placeholder="ENTER QUANTITY">
    </br>
    <button class='btn'>SUBMIT</button>


    </form>
    <a href="outputs.php" title="output page">
    <button class='btn'>PREVIOUS ORDERS</button></a>
    <a href="home.html" title="home page">
    <button class='btn'>BACK TO HOME</button></br></a>
  </div>
</body>
</html>