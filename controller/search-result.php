<?php
require_once("include.php");
include("fonction.php");


//fonction de recherche 
if(isset ($_POST['code']) and ($_POST['code']!='')){
    $code = findMaterielbyCB($_POST['code']);
}else{
    $code[0] = 'Aucun Resultat';
}


if(isset ($_POST['description']) and ($_POST['description']!='')){
    $desc = findMaterielbyDescription($_POST['description']);
}else{
    $desc[0] = 'Aucun Resultat';
}


if(isset ($_POST['nom']) and ($_POST['nom']!='')){
    $nom =  findMaterielbyName($_POST['nom']) ;
}else{
    $nom[0] = 'Aucun Resultat';
}

$nom =  findMaterielbyName($_POST['nom']) ;

echo $twig->render('search-result.twig', ['codeBarre'=>$code,'description'=>$desc, 'nom'=>$nom]);