<?php  
 require_once("../connect.php"); 
 if(!empty($_POST)){

    $nomeCientifico = mysqli_real_escape_string($connect, $_POST["nomeCientifico"]);
    $nomeComum = mysqli_real_escape_string($connect, $_POST["nomeComum"]);
    $especie = mysqli_real_escape_string($connect, $_POST["especie"]);
    $familia = mysqli_real_escape_string($connect, $_POST["familia"]);
    $ordem = mysqli_real_escape_string($connect, $_POST["ordem"]);
    $fotosUrl = mysqli_real_escape_string($connect, $_POST["fotosUrl"]);
    $qrcode = mysqli_real_escape_string($connect, $_POST["qrcode"]);
    $descricao = mysqli_real_escape_string($connect, $_POST["descricao"]);
    $verificar = "SELECT nomeCientifico  FROM planta WHERE nomeCientifico='".$nomeCientifico."' ";
    $result = mysqli_query($connect,$verificar);
    if ($result->num_rows >0) {
      echo "<h3>Esta planta já está registada!</h3>";
    }else{
      $insert = "INSERT INTO planta (nomeCientifico, nomeComum, especie, familia, ordem, fotosURL, qrcode, descricao) VALUES ('$nomeCientifico','$nomeComum','$especie', '$familia', '$ordem', '$fotosUrl', '$qrcode', '$descricao' )";
    
     
      if (mysqli_query($connect, $insert)) {
          $message = "Adicionado com sucessos";
          echo "<script type='text/javascript'>alert('$message');</script>";
          

      }
    }
}
?>



 