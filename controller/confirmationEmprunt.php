<?php
require_once("include.php");
include("fonction.php");

if(isset($_SESSION['id'])){
    $pret = new pret(
        '',
        $_POST["dateDebut"],
        $_POST["dateFinPrevu"],
        "",
        $_POST["utilisateurId"],
        $_POST["materielId"]
        );
    
    createEmprunt($pret);

    print_r($pret);
    
    echo $twig->render('confirmationEmprunt.twig', ['post' => $_POST]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}



