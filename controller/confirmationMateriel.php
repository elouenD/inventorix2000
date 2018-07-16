<?php
require_once("include.php");
include("fonction.php");



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




print_r( $materiel);


echo $twig->render('confirmationMateriel.twig', ['post' => $_POST]);