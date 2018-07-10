<?php
require_once("include.php");
include("fonction.php");
$etudiant=etudiantInfo();

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => true];

echo $twig->render('etudiant.twig', ['name' => "hello etudiant", 'nav' => $nav, 'etudiant'=>$etudiant]);
