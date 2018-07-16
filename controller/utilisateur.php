<?php
require_once("include.php");
include('fonction.php');

if(isset($_SESSION['id'])){
    $userInfo=userInfo();
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => true, 'etudiant' => false];
    
    echo $twig->render('utilisateur.twig', ['name' => "page utilisateur", 'nav' => $nav , 'user'=> $userInfo]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}



