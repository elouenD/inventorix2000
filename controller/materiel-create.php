<?php
require_once("include.php");
include("fonction.php");
$fournisseurList = materielFournisseur();

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => true, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];


echo $twig->render('materiel-create.twig', ['name' => "hello woefezffssefezfrld", 'nav' => $nav, 'fournisseur'=>$fournisseurList]);