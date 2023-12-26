<?php
session_start();
$host = "localhost"; 
$user = "root";
$password = ""; 
$dbname = "bank"; 

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if ($conn)
{
//    echo"Database connected"."<br>";
}
else
{
  die("Connection failed: " . mysqli_connect_error());
}
?>