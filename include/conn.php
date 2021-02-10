<?php


$servername = "localhost";
$database = "bd_fa";
$username = "root";
$senhaserver = "";
// Create connection
$conn = mysqli_connect($servername, $username, $senhaserver, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
 
 ?>