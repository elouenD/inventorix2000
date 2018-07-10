<?php
require_once("include.php");

// Set navigation
$nav = (object) ['accueil' => true, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];

echo $twig->render('home.twig', ['appName' => "Inventorix 2000", 'nav' => $nav]);
