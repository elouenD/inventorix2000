<?php
require_once("include.php");
include("fonction.php");

//insertion en base
if (isset($_POST["mail"]) && isset($_POST["login"])){
    updateUser($_POST['id'], $_POST["mail"],$_POST["login"]);
}

echo $twig->render('confirmationUtilisateur.twig', ['post' => $_POST]);