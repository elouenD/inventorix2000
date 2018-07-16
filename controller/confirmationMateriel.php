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
>>>>>>> fd9a5e185de123d661b921285570ada01925e3ff

echo $twig->render('confirmationMateriel.twig', ['post' => $_POST]);