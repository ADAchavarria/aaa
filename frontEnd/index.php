
<?php 
HEADER("Access-Control-Allow-Origin");
  require_once("bd/connection.php");
  $pesquisa = $_POST['pesquisa'];

  $count =0;
  $limit =5;
  $result = mysqli_query($connect,"SELECT * FROM planta WHERE nomeCientifico = '".$pesquisa."'");

  while($row = mysqli_fetch_array($result)){

    $nomeCientifico = $row['nomeCientifico'];
    $nomes = $row['nomeComum'];
   // var_dump($nomes);
    $nomeComum = explode(";",$nomes);
   // var_dump($nomeComum);
    $especie = $row['especie'];
    $familia = $row['familia'];
    $ordem = $row['ordem'];
    $descricao = $row['descricao'];
    $fotos = $row['fotosURL'];

   


  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resume - Start Bootstrap Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/resume.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">

      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Planta</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#experience">Descrição</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#education">Informação</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#skills">Imagens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#interests">Ver Mais</a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">

         



        <div class="my-auto">
          <h1 class="mb-0">
            <span class="text-primary"><?php echo"$nomeCientifico" ?></span>
            <p>
<?php
$base = "https://jb.utad.pt/gogogo/pesquisa?tipo=1&pagina=1&termo=";
$pesquisa = $base . urlencode($nomeCientifico);
$resultado = file_get_contents($pesquisa);
$resultadoPHP = json_decode($resultado);
$url = $resultadoPHP[0]->children[0]->url;
$paginabase = "https://jb.utad.pt";
$paginaURL = $paginabase.$url;
$paginaHTML = file_get_contents($paginaURL);
$doc = new DOMDocument();
@$doc->loadHTML($paginaHTML);
$xpath = new DOMXpath($doc);
$linksImagens = $xpath->query('//a[@class="imagem"]');
$URLsImagens = Array();
$i=0;
foreach ($linksImagens as $linkImagem) {
  $i++;
  if($i<2){
    $URLsImagens[] = "http:" . $linkImagem->attributes[2]->textContent;
}
}
foreach ($URLsImagens as $imagem) {
    echo "<img style ='width:160px; margin-left:auto; margin-right:auto; border-radius: 50%;' src=".$imagem.">";
}


//var_dump($URLsImagens);

?>
</p>
          </h1>
          <p class="lead mb-5"></p>
          <div class="social-icons">
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#">
              <i class="fab fa-github"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
        <div class="my-auto">
          <h2 class="mb-5">Descrição</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              
              <p style="font-size: 22px"><?php echo"$descricao" ?></p>
            </div>
            <div class="resume-date text-md-right">
             
            </div>
          </div>

         

        </div>

      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="education">
        <div class="my-auto">
          <h2 class="mb-5">Informação Geral</h2>

          <div class="resume-item d-flex flex-column flex-md-row mb-5">
            <div class="resume-content mr-auto">
              <h3 class="mb-0" style="padding-bottom:25px">Nomes Comuns</h3>
              
              <div><?php echo "$nomes" ?></div>
              <p><?php echo"<hr>"; ?></p>
            </div>
          </div>

          <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0" style="padding-bottom:25px">Especie</h3>
              <div><?php echo "$especie" ?></div>
              <p><?php echo"<hr>"; ?></p>
            </div>
            <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0" style="padding-bottom:25px">Familia</h3>
              <div><?php echo "$familia" ?></div>
              <p><?php echo"<hr>"; ?></p>
             
            </div>
            <div class="resume-item d-flex flex-column flex-md-row">
            <div class="resume-content mr-auto">
              <h3 class="mb-0" style="padding-bottom:25px">Ordem</h3>
              <div><?php echo "$ordem" ?></div>
              <p><?php echo"<hr>"; ?></p>
            </div>
          </div>

        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
        <div class="my-auto">
          <h2 class="mb-5">Imagens</h2>
          <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
 
          <?php

$base = "https://jb.utad.pt/gogogo/pesquisa?tipo=1&pagina=1&termo=";
$pesquisa = $base . urlencode($nomeCientifico);
$resultado = file_get_contents($pesquisa);
$resultadoPHP = json_decode($resultado);
//var_dump($resultadoPHP);
$url = $resultadoPHP[0]->children[0]->url;
// busca página
$paginabase = "https://jb.utad.pt";
$paginaURL = $paginabase.$url;
$paginaHTML = file_get_contents($paginaURL);
//echo $pagina;
$doc = new DOMDocument();
@$doc->loadHTML($paginaHTML);
//var_dump($doc);
$xpath = new DOMXpath($doc);
$linksImagens = $xpath->query('//a[@class="imagem"]');
//var_dump($imagens);
$URLsImagens = Array();


$i=0;
foreach ($linksImagens as $linkImagem) {
  $i++;
  if($i<6){
    $URLsImagens[] = "http:" . $linkImagem->attributes[2]->textContent;
}

}

foreach ($URLsImagens as $imagem) {
  echo "<img style ='width:50%; margin-bottom: 15px; border-radius: 8px; border: 1px solid #ddd' src=".$imagem.">";
}

//var_dump($URLsImagens);





?>



        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
        <div class="my-auto">
          <h2 class="mb-5" >Ver mais ...</h2>
          <p><?php
          $site = str_replace(' ','_',$nomeCientifico);
          //var_dump($site);
          
          echo "<a href='https://jb.utad.pt/especie/$site'>Visita o Jardim Botanico da UTAD</a>"  ?></p>
          <p><?php
          $site1 = str_replace(' ','-',$nomeCientifico);
          //var_dump($site);
          
          echo "<a href='https://pt.wikipedia.org/wiki/$site'>Wikipedia</a>"  ?></p>

<p><?php
          $site = str_replace(' ','_',$nomeCientifico);
          //var_dump($site);
          
          echo "<a href=http://www.ipvc.pt/'>Intituto Politécnico de Viana do Castelo</a>"  ?></p>

<p><?php
          $site = str_replace(' ','_',$nomeCientifico);
          //var_dump($site);
          
          echo "<a href='http://www.estg.ipvc.pt/'>Escola Superior de Tecnologia e Gestão</a>"  ?></p>


        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
        <div class="my-auto">
          <h2 class="mb-5">Parceiros</h2>
          <ul class="fa-ul mb-0">
           <p> <img src="img/logo.png"style="width:140px;margin-right: 30px; height:60px;">
            <img src="img/utad.png"style="width:140px; height:180px;"> </p>
            <p style="margin-top:30px;">
            <img src="img/estg.png"style="width:140px; margin-right:55px height:110px;">
            <img src="img/ipvc.png"style="width:140px; height:110px;"> </p>
          </ul>
        </div>
      </section>

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/resume.min.js"></script>

  </body>

</html>
