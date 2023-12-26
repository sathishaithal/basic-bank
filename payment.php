<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 </head>
 <body>
    <?php  
        include_once('config.php');
        if(!$conn){
            die("Connection to this database failed due to" . mysqli_connect_error());
        }
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $sender = $_POST['sender'];
            $rec = $_POST['rec'];
            $amount = $_POST['amount'];
        }
        $sql3 ="SELECT balance FROM customer where Name='$sender';";
        $sql = "UPDATE customer SET balance=(balance-$amount) where Name='$sender';";
        $sql1 = "UPDATE customer SET balance=(balance+$amount) where Name='$rec';";
        $sql2 = "INSERT INTO history (sender,reciever,amount)VALUES('$sender','$rec',$amount)";
            $result3=mysqli_query($conn,$sql3);
        while($row3 = mysqli_fetch_array($result3)){
            if($amount>$row3["balance"]){
                echo "<script> alert('Insufficient Balance....... please check once.....')</script>";
                echo "<script> window.location.href='customer.php'</script>";
            }
            else{
                $result=mysqli_query($conn,$sql);
                $result1=mysqli_query($conn,$sql1);
                $result2=mysqli_query($conn,$sql2);
                echo "<script> alert(' Your Transaction is Successful ')</script>";
                echo "<script> window.location.href='index.html'</script>";
            }
        }
    ?>
 </body>
</html>