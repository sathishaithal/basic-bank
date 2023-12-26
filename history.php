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
  <title>Bankaza Bank History</title>
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
    <br><br>
		<h2 id="header">Customer's Record</h2><br>
            <tr>
                <th>User ID</th>
                <th>Sender</th>
                <th>Reciever</th>
                <th>Transacted Amount</th>
            </tr>

		<?php

        while($rows=mysqli_fetch_assoc($result))
		{
		?>
		<tr> <td><?php echo $rows['id']; ?></td>
		<td><?php echo $rows['sender']; ?></td>
		<td><?php echo $rows['reciever']; ?></td>
		<td><?php echo $rows['amount']; ?></td>
		</tr>
	<?php
               }
          ?>

	</table>




  <footer id="footer">
        <p>&copy; Copyright 2023 <span class="footer_logo">Basic Bank </span></p>
    </footer>
</body>

</html>