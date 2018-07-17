<?php
require_once("include.php");
include("fonction.php");

if(isset($_SESSION['id'])){
    //insertion en base
    if (isset($_POST["mail"]) && isset($_POST["login"])){
        updateMateriel($_POST['id'], $_POST["mail"],$_POST["login"]);
    }
    
    echo $twig->render('confirmationUpdateUtilisateur.twig', ['post' => $_POST]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}
//insertion en base
if (isset($_POST["mail"]) && isset($_POST["login"])){
    updateUser($_POST['id'], $_POST["mail"],$_POST["login"]);
}
?>