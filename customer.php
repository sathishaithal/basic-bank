<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank amt transfer History</title>
    <link rel="stylesheet" href="index.css">
   
  </head>

  <body>
    <div class="containe">
      
      <div class="s">
        <div class="s-right">
        <a href="index.html">Home</a>
            <a href="list.php">View Customers</a>
            <a href="history.php">View Transactions</a>
        </div>
    </div>

      <?php  

        include_once('config.php');

      ?> 

      <table id="admin">


    
		<h2 id="header" style="font-weight: bold;  color: #094c57; font-size:50px;text-align: center;">Customer's Record</h2>
            <tr>
                <th>User ID</th>
                <th>Sender</th>
                <th>Reciever</th>
                <th>Transacted Amount</th>
            </tr>

		<?php

$sql = "SELECT id,Name,email,balance FROM customer;";
$sql1 = "SELECT Name FROM customer;";


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



  <h1 style="letter-spacing: 2px; font-weight: bold;  color: red; font-size:90px; text-align: center;">Make a Transaction</h1>
    
      <form action="select.php" method="POST" style="text-align:center">
             
        <h3 class="aa"style="font-weight: bold;  color:blue; font-size:50px; ">Customer Name</h3>
        <select id="cus" name="cus" style="width: 18%; height: 26px; margin-left: 8px; background-color:#f9ac66;font-size: large;font-weight: 400;">
          <?php $result1=mysqli_query($conn,$sql1); ?>
          <?php while($row1=mysqli_fetch_array($result1)):; ?>
          <option value="<?php echo $row1[0]; ?>">
            <?php echo $row1[0]; ?>
          </option>
          <?php endwhile ;
            $conn->close();
          ?>
        </select><br>
        
        <div>
          <button class="button" style="margin-top:20px;">Select</button>
        </div>

      </form>
      <br><br>
    </div>

    <footer id="footer">
        <p>&copy; Copyright 2023 <span class="footer_logo">Basic Bank </span></p>
    </footer>
  </body>
</html>