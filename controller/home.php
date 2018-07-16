<?php
require_once("include.php");
include("fonction.php");


if(isset($_SESSION['id'])){
    $statsEmprunt = statsEmprunt();
    $statsEmpruntNonRendu = statsEmpruntNonRendu();
    $statsMaterielDispo = statsMaterielDispo();
    $statMaterielRendre = statMaterielRendre();
    
    // Set navigation
    $nav = (object) ['accueil' => true, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];
    echo $twig->render('home.twig', ['appName' => "Inventorix 2000", 'nav' => $nav, 'statsEmprunt' => $statsEmprunt, 'statsEmpruntNonRendu' => $statsEmpruntNonRendu, 'statsMaterielDispo' => $statsMaterielDispo, 'statMaterielRendre' => $statMaterielRendre]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}
