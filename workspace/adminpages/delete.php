<?php 
 require_once("../connect.php");  
 if(isset($_POST["nomeCientifico"]))  
 {  
         
      $query = "DELETE FROM planta WHERE nomeCientifico = '".$_POST["nomeCientifico"]."'";  
      $result = mysqli_query($connect, $query);  
      
 }  
 ?>


 