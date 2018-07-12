<?php
require_once("include.php");
include('fonction.php');

$empruntInfo=empruntInfo();

$idMat = $_GET['id'];

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => true, 'utilisateur' => false, 'etudiant' => false];



echo $twig->render('emprunt-create.twig', ['name' => "page emprunt create", 'autre' => "autre chose", 'nav' => $nav, 'emprunt'=> $empruntInfo, 'idMat'=>$idMat]);



?>