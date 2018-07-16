<?php
require_once("include.php");
require('fonction.php');

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => true, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];

if(isset($_GET['idToDelete'])){
    $idToDelete = $_GET['idToDelete'];
    deleteMateriel($idToDelete);
}else if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $materielSpec = materielInfoSpec($id);
}


if(isset($_SESSION['id'])){
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => true, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];
    $id = $_GET['id'];
    $materielSpec = materielInfoSpec($id);
    $session =  $_SESSION['id'];
    
    if(isset($_GET['idToDelete'])){
        $idToDelete = $_GET['idToDelete'];
        echo($idToDelete);
        deleteMateriel($idToDelete);
    } else if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $materielSpec = materielInfoSpec($id);
    }

    echo $twig->render('materiel-detail.twig', ['id' => $id, 'nav' => $nav, 'spec'=>$materielSpec[0], 'session' => $session]);
    
}
else{
    echo '<a href="index.php">Vous n êtes pas connecté(e)</a>';
    $session = "Rien";
}




