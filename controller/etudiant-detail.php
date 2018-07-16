<?php
require_once("include.php");
require("fonction.php");

// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => true];

if(isset($_GET['idToDelete'])){
    $idToDelete = $_GET['idToDelete'];
    echo("test");
    deleteUser($idToDelete);
} else if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $userInfo=userInfospec($id);
}



echo $twig->render('etudiant-detail.twig', ['id' => $id, 'nav' => $nav, 'userInfo'=> $userInfo[0]]);
