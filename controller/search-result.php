<?php
require_once("include.php");
include("fonction.php");


//fonction de recherche 

$code = findMaterielbyCB($_POST['code']);
$desc = findMaterielbyDescription($_POST['description']);
$nom =  findMaterielbyName($_POST['nom']) ;

echo $twig->render('search-result.twig', ['codeBarre'=>$code,'description'=>$desc, 'nom'=>$nom]);