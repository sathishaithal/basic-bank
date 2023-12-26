<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="index.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   </head>

 <body>
        <div class="s">
        <div class="s-right">
        <a href="index.html">Home</a>
            <a href="list.php">View Customers</a>
            <a href="history.php">View Transactions</a>
        </div>
    </div>
        <?php  

            include_once('config.php');
             if($_SERVER['REQUEST_METHOD']=='POST'){
                 $name = $_POST['cus'];
             }
            $sql = "SELECT balance FROM customer WHERE Name='$name';";
            $sql1 = "SELECT Name FROM customer;";
        ?>

        <div class="int">
            <h1 style="letter-spacing: 2px; font-weight: bold; color:#2b67f8;text-align: center;">Make a Transaction</h1>
        </div><br>

        <div class="container" style="width:100%; text-align: center;">
            <form action="payment.php" method="POST">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Sender &nbsp</span>
                    </div>
                    <input type="text" value="<?php echo $name ?>" class="form-control" id="sender" name="sender"
                        aria-label="Default" aria-describedby="inputGroup-sizing-default" readonly>
                </div>
                
                <?php $result=mysqli_query($conn,$sql); ?>
                <?php while($row=mysqli_fetch_array($result)):; ?>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Balance&nbsp</span>
                    </div>
                    <input type="text" value="<?php echo $row[0];?>" class="form-control" aria-label="Default"
                        aria-describedby="inputGroup-sizing-default" readonly>
                </div>
                <?php endwhile ;
                ?>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Receiver</span>
                    </div>
                    <select id="rec" name="rec" class="form-control" aria-label="Default"
                        aria-describedby="inputGroup-sizing-default">
                        <?php $result1=mysqli_query($conn,$sql1); ?>
                        <?php while($row1=mysqli_fetch_array($result1)):; ?>
                        <option value="<?php echo $row1[0]; ?>">
                            <?php echo $row1[0]; ?>
                        </option>
                        <?php endwhile ;
                            $conn->close();
                        ?>
                    </select>
                </div>
                
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Amount</span>
                    </div>
                    <input type="number" name="amount" class="form-control" aria-label="Default"
                        aria-describedby="inputGroup-sizing-default" required placeholder="Enter Amount here"
                        oninvalid="this.setCustomValidity('Please Enter Price')" oninput="this.setCustomValidity('')">
                </div>
                <button class="btn btn-info btn-lg btn-block mt-5" value="Transfer">Send Money</button>
            </form>
        </div>
    </div>
 </body>
</html>