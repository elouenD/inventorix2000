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

<<<<<<< HEAD
//insertion en base 
createMateriel($materiel);

=======
>>>>>>> 139db5ab250bc5757080987dea62b6960dbaf9c1

echo $twig->render('confirmationMateriel.twig', ['post' => $_POST]);