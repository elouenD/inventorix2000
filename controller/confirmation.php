<?php
require_once("include.php");
include("fonction.php");


/*
$materiel = new materiel(
    '',
    $_POST["codeBarre"],
    $_POST["nom"],
    $_POST["description"],
    $_POST["dateAchat"],
    $_POST["prixAchat"],
    $_POST["fournisseur"],
    ''
);






function createMateriel($codeBarre,$nom,$description,$dateAchat,$prixAchat,$fournisseurId){
    $bdd=NULL;
    //appel de dbConnect pour instancier une connexion à la base de donnée
    $bdd=dbConnect();
    $newMateriel = $bdd->prepare("INSERT INTO `materiel` (`CodeBarre`, `Nom`, `Description`, `DateAchat`, `PrixAchat`,`Fournisseur_Id`) VALUES ( ?, ?, ?, ?, ?, ?);");
    $newMateriel->execute(array($codeBarre,$nom,$description,$dateAchat,$prixAchat,$fournisseurId));
}
*/

echo $twig->render('confirmation.twig', ['post' => $_POST]);