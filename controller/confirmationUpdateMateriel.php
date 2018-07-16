<?php
require_once("include.php");
include("fonction.php");

if(isset($_SESSION['id'])){
    //insertion en base
    if (isset($_POST["description"])){
        updateMateriel($_POST["description"],$_POST["updateDesc"]);
    }
    echo $twig->render('confirmationMateriel.twig', ['post' => $_POST]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}
