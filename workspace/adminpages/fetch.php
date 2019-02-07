<?php  
 //fetch.php
 require_once("../connect.php");  
 if(isset($_POST["nomeCientifico"]))  
 {  
      $query = "SELECT * FROM planta WHERE nomeCientifico = '".$_POST["nomeCientifico"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 