<?php

require_once ('connection.php');

$planta = "Pinus nigra";
$count =0;
$limit =5;
echo "<table>";
$res = $connect->query("SELECT * FROM fotos WHERE nomeCientifico='".$planta."'");
while ($row = mysqli_fetch_array($res)) {
 if($count ==0){
  echo "<tr>";	
} 
if($count == $limit-1) {
  echo "<td ><div class='containerx'><img style='margin-right:10px;width:500px;heigth:500px' src =".$row['fotosURL']." >";
  echo '</td>';
  echo "</tr>";
  $count =0;
}

}

echo "</table>";


?>

