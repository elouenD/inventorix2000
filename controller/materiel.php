<?php
require_once("include.php");
include("fonction.php");



if(isset($_SESSION['id'])){
    $materielInfo=materielInfo();

    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => true, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];
    
    echo $twig->render('materiel.twig', ['nameUnique' => "hello", 'nav' => $nav, 'materiel'=>$materielInfo]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}



