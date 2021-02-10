<?php


$servername = "br78.hostgator.com.br";
$database = "felic009_bd_fa";
$username = "felic009_lks";
$senhaserver = "Oigalera123";
// Create connection
$conn = mysqli_connect($servername, $username, $senhaserver, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
 
 ?>