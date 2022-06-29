<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imasha_car_rental";

$con = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
?>