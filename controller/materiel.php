<?php
require_once("include.php");
include("fonction.php");
$materielInfo=materielInfo();

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => true, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];

echo $twig->render('materiel.twig', ['nameUnique' => "hello", 'nav' => $nav, 'materiel'=>$materielInfo]);
