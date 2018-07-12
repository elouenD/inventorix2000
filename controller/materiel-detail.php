<?php
require_once("include.php");

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => true, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];

$id = $_GET['id'];


echo $twig->render('materiel-detail.twig', ['id' => $id, 'nav' => $nav]);
