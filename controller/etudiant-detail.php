<?php
require_once("include.php");
require("fonction.php");

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => true];

$id = $_GET['id'];
$userInfo=userInfospec($id);
echo $twig->render('etudiant-detail.twig', ['id' => $id, 'nav' => $nav, 'userInfo'=> $userInfo[0]]);
