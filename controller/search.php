<?php
require_once("include.php");
include("fonction.php");


// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false, 'search'=>true];

echo $twig->render('search.twig', ['name' => "hello etudiant", 'nav' => $nav]);
