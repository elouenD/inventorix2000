<?php
require_once("include.php");
require('fonction.php');
// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => true, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];

$id = $_GET['id'];
$materielSpec = materielInfoSpec($id);

echo $twig->render('materiel-detail.twig', ['id' => $id, 'nav' => $nav, 'spec'=>$materielSpec[0]]);
