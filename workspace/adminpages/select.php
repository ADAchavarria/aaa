<?php 
 require_once("../connect.php");  
 if(isset($_POST["nomeCientifico"]))  
 {  
      $output = '';   
      $query = "SELECT * FROM planta WHERE nomeCientifico = '".$_POST["nomeCientifico"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><b>Nome Comum:</b></td>  
                     <td width="70%">'.$row["nomeComum"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b>Espécie:</b></td>  
                     <td width="70%">'.$row["especie"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b>Familia:</b></td>  
                     <td width="70%">'.$row["familia"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><b>Ordem:</b></td>  
                     <td width="70%">'.$row["ordem"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><b>Fotos:</b></td>  
                     <td width="70%">'.$row["fotosURL"].'</td>  
                </tr>    
                <tr>  
                     <td width="30%"><b>QrCode:</b></td>  
                     <td width="70%"><img src='.$row["qrcode"].'></td>  
                </tr>
                <tr>  
                     <td width="30%"><b>Descrição:</b></td>  
                     <td width="70%">'.$row["descricao"].'></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>
      
                            
                            
        
      ';  
      echo $output;  
 }  
 ?>


 