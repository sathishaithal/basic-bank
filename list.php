<?php
include_once('config.php');
$query="select * from history";
$result=mysqli_query($conn,$query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BaNk</title>
  <link rel="stylesheet" href="index.css">
</head>

<body>

<div class="s">
        <div class="s-right">
        <a href="index.html">Home</a>
            <a href="list.php">View Customers</a>
            <a href="history.php">View Transactions</a>
        </div>
    </div>

  </div>

<table id="admin">



<h2 id="header" style="font-weight: bold;  color: #094c57; font-size:50px;text-align: center;">Customer's Record</h2>
    <tr>
        <th>User ID</th>
        <th>Sender</th>
        <th>E-Mail ID</th>
        <th>Balance Amount</th>
    </tr>

<?php

$sql = "SELECT id,Name,email,balance FROM customer;";
$sql1 = "SELECT Name FROM customer;";

// Execute the query
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result)){

echo '<tr>
<td>'.$row["id"].'</td>
<td>'.$row["Name"].'</td>
<td>'.$row["email"].'</td>
<td>'.$row["balance"].'</td>
</tr>';
}
  ?>

</table>





<footer id="footer">
        <p>&copy; Copyright 2023 <span class="footer_logo">Basic Bank </span></p>
    </footer>
</body>

</html>