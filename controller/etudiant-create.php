<?php
require_once("include.php");

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => true];

echo $twig->render('etudiant-create.twig', ['nav' => $nav]);