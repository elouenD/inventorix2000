<?php
require_once("include.php");
include("fonction.php");

echo ($_POST['login']);
//insertion en base
if (isset($_POST["mail"]) && isset($_POST["login"])){
    updateMateriel($_POST['id'], $_POST["mail"],$_POST["login"]);
}

echo $twig->render('confirmationUtilisateur.twig', ['post' => $_POST]);