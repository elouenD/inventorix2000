<?php
require_once("include.php");
include("fonction.php");

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false, 'search'=>true];


//fonction de recherche 
if(isset ($_POST['code']) and ($_POST['code']!='')){
    $code = findMaterielbyCB($_POST['code']);
}else{
    $code[0]['Nom'] = 'Aucun Resultat';
}


if(isset ($_POST['description']) and ($_POST['description']!='')){
    $desc = findMaterielbyDescription($_POST['description']);
}else{
    $desc[0]['Nom'] = 'Aucun Resultat';
}


if(isset ($_POST['nom']) and ($_POST['nom']!='')){
    $nom =  findMaterielbyName($_POST['nom']) ;
}else{
    $nom[0]['Nom'] = 'Aucun Resultat';
}


echo $twig->render('search-result.twig', ['codeBarre'=>$code,'description'=>$desc, 'nom'=>$nom]);