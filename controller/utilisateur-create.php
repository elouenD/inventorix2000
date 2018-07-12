<?php
require_once("include.php");

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => true, 'etudiant' => false];

echo $twig->render('utilisateur-create.twig', ['nav' => $nav]);
