<?php
require_once("include.php");

if(isset($_SESSION['id'])){
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => true];
    
    echo $twig->render('etudiant-create.twig', ['nav' => $nav]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}



