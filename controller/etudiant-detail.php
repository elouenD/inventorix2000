<?php
require_once("include.php");

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => true];

$id = $_GET['id'];

echo $twig->render('etudiant-detail.twig', ['id' => $id, 'nav' => $nav]);
