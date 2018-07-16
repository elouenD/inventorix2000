<?php
require_once("include.php");
include("fonction.php");

$auth = connect($_POST["login"],$_POST["password"]);



if (!$auth){
    $messageAuth = "Connexion echouee !";
    $boutonRef = "index.php";
    $boutonNext = "Retour a la page de connexion";
}
else {
    $messageAuth = "Connexion reussi !";
    $boutonRef = "home.php";
    $boutonNext = "Acceder a la page d'accueil";
}

echo $twig->render('confirmationConnexion.twig', ['post' => $_POST, 'messageAuth' => $messageAuth, 'page' => $boutonRef, 'bouton' => $boutonNext]);