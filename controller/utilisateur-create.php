<?php
require_once("include.php");



if(isset($_SESSION['id'])){
    
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => true, 'etudiant' => false];
    
    echo $twig->render('utilisateur-create.twig', ['nav' => $nav]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}




