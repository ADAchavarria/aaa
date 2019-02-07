<?php 
 require_once("../connect.php");


 if(isset($_POST["nomeCientifico"]))
 	{  
       
    
    $descricao = mysqli_real_escape_string($connect, $_POST["descricao"]);  
      if($_POST != '')  
      {  
           $query = "  
           UPDATE planta   
           SET 
           descricao = '$descricao' 
           WHERE nomeCientifico='".$_POST["nomeCientifico"]."'"; 

          $result = mysqli_query($connect, $query);  
             
      }

   }

   ?>