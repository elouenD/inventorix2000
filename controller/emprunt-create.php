<?php
require_once("include.php");
include('fonction.php');

if(isset($_SESSION['id'])){
    
    $etudiantInfos=etudiantInfo();
    $materielInfos=materielInfo();
    
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => true, 'utilisateur' => false, 'etudiant' => false];

    echo $twig->render('emprunt-create.twig', ['name' => "page emprunt create", 'nav' => $nav, 'etudiantInfos'=> $etudiantInfos, 'materielInfos' => $materielInfos]);
    
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}



