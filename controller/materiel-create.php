<?php
require_once("include.php");
include("fonction.php");



if(isset($_SESSION['id'])){
    $fournisseurList = materielFournisseur();
    
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => true, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];
    
    
    echo $twig->render('materiel-create.twig', ['name' => "hello woefezffssefezfrld", 'nav' => $nav, 'fournisseur'=>$fournisseurList]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}



