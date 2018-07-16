<?php
require_once("include.php");
include("fonction.php");


$pret = new pret(
    '',
    $_POST["dateDebut"],
    $_POST["dateFinPrevu"],
    $_POST["dateRendu"],
    $_POST["utilisateurId"],
    $_POST["materielId"]
);

createEmprunt($pret);


print_r($pret);


echo $twig->render('confirmationEmprunt.twig', ['post' => $_POST]);