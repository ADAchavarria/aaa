<?php 


require_once ('connect.php');
session_start();

$nomeuser = ($_POST["username"]); 
$passuser = md5($_POST["password"]);

$sql = "SELECT * FROM users WHERE  username='".$nomeuser."' AND password='".$passuser."'";

$query = mysqli_query($connect,$sql);


$result = $connect->query($sql);

if (mysqli_num_rows($query) > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		$_SESSION["username"]=$row["username"];
		$_SESSION["id"]=$row["id"];

		header('Location: adminpages/index.html');

	}

} else {

	
             
	header('Location: login.php');


	
}

?>