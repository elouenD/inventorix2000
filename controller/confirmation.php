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
    $_POST["fournisseur"],
    ''
);




print_r( $materiel);

//insertion en base 
createMateriel($materiel);


echo $twig->render('confirmation.twig', ['post' => $_POST]);