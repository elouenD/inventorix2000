<?php
require_once("include.php");
include("fonction.php");


if(isset($_SESSION['id'])){
    $utilisateur = new utilisateur(
        '',
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["mail"],
        $_POST["login"],
        $_POST["mdp"],
        ''
        );
    
    createUser($utilisateur);

    echo $twig->render('confirmationUtilisateur.twig', ['post' => $_POST]);
    
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}



