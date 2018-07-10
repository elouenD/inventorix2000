<?php
require_once("include.php");
include('fonction.php');

$empruntInfo=empruntInfo();
// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => true, 'utilisateur' => false, 'etudiant' => false];



echo $twig->render('emprunt.twig', ['name' => "page emprunt", 'autre' => "autre chose", 'nav' => $nav, 'emprunt'=> $empruntInfo]);



?>