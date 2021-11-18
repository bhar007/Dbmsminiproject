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
  $age = $_POST['age'];
  $phno  = $_POST['phno'];
  $email = $_POST['email'];
  $sql = "INSERT INTO `customer` (`NAME`, `AGE`, `PHONENO`, `EMAIL`) VALUES ('$name', '$age', '$phno', '$email');";
  
  if($con->query($sql)==true)
  {
    echo "Successfully inserted.";
    echo "<br>";
    $last_id = $con->insert_id;
    echo "Customer id is ".$last_id;
    /* $result = "SELECT `Cid` FROM `customer`";
    if($result->num_rows>0){
    echo "hello";
    $res = $con->query($result);
    $row = $res->fetch_array();
    echo $res['Cid'];  
  }*/

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
  <title>Customer</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h3>ENTER CUSTOMER DETAILS</h3>
    <p>ENTER YOUR DETAILS AND SUBMIT TO CONFIRM.</p>
    <form action="customer.php" method="post">
    <input type="text" name="name" id="name" placeholder="ENTER YOUR NAME">
    <input type="text" name="age" id="age" placeholder="ENTER YOUR AGE">
    <input type="text" name="phno" id="phno" placeholder="ENTER YOUR phno">
    <input type="text" name="email" id="email" placeholder="ENTER YOUR EMAIL"></br>
    <textarea name="desc" id="desc" cols="30" rows="10" placeholder="ENTER ANY COMMENT"></textarea>
    </br>
    <button class='btn'>SUBMIT</button>
    </form>
    <a href="home.html" title="home page">
    <button class='btn'>BACK TO HOME</button></br></a>
  </div>
</body>
</html>