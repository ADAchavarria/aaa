
<?php

require_once("../connect.php");
require 'phpqrcode/qrlib.php';


if (@$_GET['search']) {

  $pesq = $_GET['search'];
  $pesq = urlencode($pesq);




  $api_url = "https://pt.wikipedia.org/w/api.php?format=json&action=query&prop=extracts&exintro&explaintext&redirects=1&titles=".$pesq;
  //.ucwords($_GET['search']);
  //$api_url= str_replace(' ', '%20', $api_url);

  //echo($api_url);
  //$api_url= str_replace('_','%20', $api_url);


  if ($data = json_decode(file_get_contents($api_url))) {
    foreach ($data->query->pages as $key => $val) {
      $pageId = $key;
      break;
    }

    $content = $data->query->pages->$pageId->extract;
    
    header('Content-Type:text/html; charset=utf-8');
    
    
  }
  else{
    //echo $data;
    echo 'No result found...';
  }
}


if ($_GET['search']) {


  //Declaramos una carpeta temporal para guardar la imagenes generadas
  $dir = 'temp/';
  
  //Si no existe la carpeta la creamos
  if (!file_exists($dir))
    mkdir($dir);
  
        //Declaramos la ruta y nombre del archivo a generar
  $search = ucfirst($_GET['search']);
  $search = str_replace('%20','_', $search);
  $search = str_replace(' ', '_', $search);
  $filename = $dir.$search.ucwords('.png');

        //Parametros de Condiguración
  
  $tamaño = 10; //Tamaño de Pixel
  $level = 'M'; //Precisión Baja
  $framSize = 3; //Tamaño en blanco
  $contenido = ($_GET['search']); //Texto
  
        //Enviamos los parametros a la Función para generar código QR 
  QRcode::png($contenido, $filename, $level, $tamaño, $framSize);


  
  
        //Mostramos la imagen generada


}

if (@$_GET['search']) {

  $termo1 = $_GET['search'];
  $termo= str_replace(' ', '_', $termo1);
  $termo= str_replace('%20', '_', $termo1);



  $base = "https://jb.utad.pt/gogogo/pesquisa?tipo=1&pagina=1&termo=";
  $pesquisa = $base . urlencode($termo);

  $resultado = file_get_contents($pesquisa);

  $resultadoPHP = json_decode($resultado);

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



  $URLsImagens = Array();



  $i=0;
  $x=0;
  foreach ($linksImagens as $linkImagem) {
    $i++;
    if($i<5){
      $URLsImagens[] = "http:" . $linkImagem->attributes[2]->textContent;
    }
  }



$divs = $xpath->query('//div[contains(@class,"parteesq")]/div/div[2]');



$descritores = array();



$descritores['especie'] = $divs[0]->textContent;



$descritores['familia'] = $divs[3]->textContent;

$descritores['ordem'] = $divs[4]->textContent;




$divnomes = $xpath->query('//div[contains(@class,"parteesq")]/div[12]/div[2]/text()');



foreach($divnomes as $nome) {

$descritores['nomes'][] = utf8_decode($nome->wholeText);

}





//var_dump($descritores['nomes'][2]);



$nomes = implode("<br>",$descritores['nomes']);

//var_dump($nomes);



$nomes2 = explode(";",$nomes);

//var_dump($nomes2);


}









//echo $content;
//echo '<img src="'.$dir.basename($filename).'" /><hr/>';
$arr = [];
$arr['imagens'] = $URLsImagens;
$arr['content'] = $content;
$arr['qrcode'] = $dir.basename($filename);
$arr['especie'] = $descritores['especie'];
$arr['familia'] = $descritores['familia'];
$arr['ordem'] = $descritores['ordem'];
$arr['nomeComum'] = $nomes;


echo json_encode($arr);








?>


