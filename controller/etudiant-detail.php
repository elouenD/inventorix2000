<?php
require_once("include.php");
require("fonction.php");




if(isset($_SESSION['id'])){
    
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => true, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false];
    if(isset($_GET['idToDelete'])){
        $idToDelete = $_GET['idToDelete'];
        echo("test");
        deleteUser($idToDelete);
    } else if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $userInfo=userInfospec($id);     
    }
    
    echo $twig->render('etudiant-detail.twig', ['id' => $id, 'nav' => $nav, 'userInfo'=> $userInfo[0]]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}
?>