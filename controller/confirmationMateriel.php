<?php
require_once("include.php");
include("fonction.php");

if(isset($_SESSION['id'])){
    $materiel = new materiel(
        '',
        $_POST["code"],
        $_POST["nom"],
        $_POST["description"],
        $_POST["dateAchat"],
        $_POST["prixAchat"],
        '',
        $_POST["fournisseur"]
        );
    
    //insertion en base
    createMateriel($materiel);

    echo $twig->render('confirmationMateriel.twig', ['post' => $_POST]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}


