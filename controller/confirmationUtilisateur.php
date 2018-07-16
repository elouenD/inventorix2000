<?php
require_once("include.php");
include("fonction.php");



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


print_r($utilisateur);


echo $twig->render('confirmationUtilisateur.twig', ['post' => $_POST]);