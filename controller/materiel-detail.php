<?php
require_once("include.php");
require('fonction.php');
// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => true, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];

if(isset($_GET['idToDelete'])){
    $idToDelete = $_GET['idToDelete'];
    echo($idToDelete);
    deleteMateriel($idToDelete);
} else if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $materielSpec = materielInfoSpec($id);
}




echo $twig->render('materiel-detail.twig', ['id' => $id, 'nav' => $nav, 'spec'=>$materielSpec[0]]);
