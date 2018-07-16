<?php
require_once("include.php");
include("fonction.php");


if(isset($_SESSION['id'])){
    $etudiant=etudiantInfo();
    
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => true];
    
    echo $twig->render('etudiant.twig', ['name' => "hello etudiant", 'nav' => $nav, 'etudiant'=>$etudiant]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}



