<?php
require_once("include.php");
include('fonction.php');

$etudiantInfos=etudiantInfo();
$materielInfos=materielInfo();

$idMat = $_GET['id'];

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => true, 'utilisateur' => false, 'etudiant' => false];



echo $twig->render('emprunt-create.twig', ['name' => "page emprunt create", 'nav' => $nav, 'etudiantInfos'=> $etudiantInfos, 'materielInfos' => $materielInfos]);



?>