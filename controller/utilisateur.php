<?php
require_once("include.php");
include('fonction.php');
$userInfo=userInfo();
// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => true, 'etudiant' => false];

echo $twig->render('utilisateur.twig', ['name' => "page utilisateur", 'nav' => $nav , 'user'=> $userInfo]);
