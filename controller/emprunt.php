<?php
require_once("include.php");
include('fonction.php');

$empruntInfo=empruntInfo();

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => true, 'utilisateur' => false, 'etudiant' => false];

$id = $_GET['id'];

if ($id) {
    $dateRendu = date("Y-m-d H:i:s");
    updateEmprunt($id, $dateRendu);
    header("Refresh:0; url=emprunt.php");
}

echo $twig->render('emprunt.twig', ['name' => "page emprunt", 'autre' => "autre chose", 'nav' => $nav, 'emprunt'=> $empruntInfo]);



?>