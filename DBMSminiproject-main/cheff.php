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
  $salary  = $_POST['salary'];
  $hire_date = $_POST['hire_date'];
  $sql = "INSERT INTO `cheff` (`NAME`, `AGE`, `SALARY`, `HIRE-DATE`) VALUES ('$name', '$age', '$salary', '$hire_date');";

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
  <title>Cheff</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h3>ENTER Cheff DETAILS</h3>
    <p>ENTER YOUR DETAILS AND SUBMIT TO CONFIRM.</p>
    <form action="cheff.php" method="post">
    <input type="text" name="name" id="name" placeholder="ENTER YOUR NAME">
    <input type="text" name="age" id="age" placeholder="ENTER YOUR AGE">
    <input type="text" name="salary" id="salary" placeholder="ENTER YOUR salary">
    <input type="text" name="hire_date" id="hire_date" placeholder="ENTER Hire-date"></br>
    
    </br>
    <button class='btn'>SUBMIT</button>
    <button class='btn'>RESET</button>


    </form>
    <a href="home.html" title="home page">
    <button class='btn'>BACK TO HOME</button></br></a>
  </div>
</body>
</html>