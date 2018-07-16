<?php
require_once("include.php");
include("fonction.php");



if(isset($_SESSION['id'])){

    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false, 'search'=>true];
    
    echo $twig->render('search.twig', ['name' => "hello etudiant", 'nav' => $nav]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}




