<?php
require_once("connection.php");

          $result = mysqli_query($connect,"SELECT nomeCientifico, nomeComum1, especie, familia,  distribuicao FROM planta");

          while($row = mysqli_fetch_array($result))
{
echo "<hr>";
$nomeCientifico =  $row['nomeCientifico'] ;
$nomeComum =  $row['nomeComum1'] ;
$nomes = explode(";",$nomeComum);
$especie =  $row['especie'] ;
$familia =  $row['familia'] ;
$distribuicao =  $row['distribuicao'] ;


echo "<hr>";
}


?>