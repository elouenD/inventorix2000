<?php
require_once("include.php");
include('fonction.php');
include('./assets/pi_barcode.php');




if(isset($_SESSION['id'])){
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false,'codeBarre'=>true];
    
    echo $twig->render('codeBarre.twig', ['name' => "page emprunt", 'autre' => "autre chose", 'nav' => $nav ]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}



