<?php
$basededados = "plantal";
$username = "root";
$password = "";
$server = "localhost";

  // Create connection
$connect =  mysqli_connect($server, $username, $password, $basededados);

  // Check connection
if ($connect->connect_error) {
	die("ERRO na ligação a BD " . $conn->connect_error);
} 
?>
