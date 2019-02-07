<?php

// fazer a pesquisa

$termo = "pinus pinaster";
$base = "https://jb.utad.pt/gogogo/pesquisa?tipo=1&pagina=1&termo=";
$pesquisa = $base . urlencode($termo);

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

foreach ($linksImagens as $linkImagem) {
    $URLsImagens[] = "http:" . $linkImagem->attributes[2]->textContent;
}

foreach ($URLsImagens as $imagem) {
    echo "<img style ='width:100px' src=".$imagem.">";
}

var_dump($URLsImagens);





?>