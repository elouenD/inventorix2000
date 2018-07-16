<?php
require_once("include.php");
include('fonction.php');


if(isset($_SESSION['id'])){
    $empruntInfo=empruntInfo();
    
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => true, 'utilisateur' => false, 'etudiant' => false];
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $dateRendu = date("Y-m-d H:i:s");
        updateEmprunt($id, $dateRendu);
        header("Refresh:0; url=emprunt.php");
    }
    
    echo $twig->render('emprunt.twig', ['name' => "page emprunt", 'autre' => "autre chose", 'nav' => $nav, 'emprunt'=> $empruntInfo]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}




