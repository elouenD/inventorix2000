<?php
require_once("include.php");

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => true, 'etudiant' => false];

$id = $_GET['id'];

echo $twig->render('utilisateur-detail.twig', ['id' => $id, 'nav' => $nav]);
