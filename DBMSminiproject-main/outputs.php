<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>output</title>
    <link rel="stylesheet" href="style.css">
    <div class="container">
    <style> 
    table{
      border-collapse:collapse;
      width:100%;
      color:black;
      font-family:monospace;
      font-size:25px;
      text-align:Left;
    }
    th{
      background-color:#588c7e;
      color:white;
    }
    
  </style>
</head>
<body>
<h2><center>ORDER DETAILS</center></h2></br>
  <table>
  <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>MEAL</th>
    <th>PRICE</th>
    <th>QUANTITY</th>
    <th>DELIVERY BOY</th>
    <th>TIME</th>
  </tr>
  </table>
<?php
  $server = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbms";
  $con = mysqli_connect($server,$username,$password,$dbname);
  if(!$con)
  {
    die("Connection to this database failed due to ".mysqli_connect_error());
  }

  $sql = "SELECT DISTINCT(o.oid), c.name as cname,m.NAME as meal,m.Price as price,o.quantity,o.time, w.name as wname from (orders o, customer c, waiter w,meal m) INNER JOIN waiter ON o.wid=w.wid INNER JOIN customer ON o.cid=c.Cid INNER JOIN meal ON o.mid=m.mid ORDER BY o.oid DESC;";
  $res = $con->query($sql);

  if($res->num_rows>0)
  {
    while($row = $res->fetch_assoc()){
      echo '<table border="0" cellspacing="3" cellpadding="3"> 
      <tr> 
          <td> <font face="Arial">'.$row['oid'].'</font> </td> 
          <td> <font face="Arial">'.$row['cname'].'</font> </td> 
          <td> <font face="Arial">'.$row['meal'].'</font> </td> 
          <td> <font face="Arial">'.$row['price'].'</font> </td> 
          <td> <font face="Arial">'.$row['quantity'].'</font> </td> 
          <td> <font face="Arial">'.$row['wname'].'</font> </td> 
          <td> <font face="Arial">'.$row['time'].'</font> </td> 
      </tr>';
      
    }
    echo "</table>";
  }
  else
  {
    echo "no rows selected";
  }
  $con->close();
?>
</div>
</body>
</html>