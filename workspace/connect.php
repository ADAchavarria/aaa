<?php 
	$connect = new mysqli("127.0.0.1","root","", "plantal");

	if ($connect->connect_errno) {
    printf("Connect failed: %s\n", $connect->connect_error);
    exit();
}


 ?>