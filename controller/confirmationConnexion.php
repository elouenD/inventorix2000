<?php
require_once("include.php");
include("fonction.php");

$auth = connect($_POST["login"],$_POST["password"]);



if (!$auth){
    $messageAuth = "Connexion echouee !";
    $boutonRef = "index.php";
}
else {
    $messageAuth = "Connexion reussi !";
    $boutonRef = "home.php";
}

echo $twig->render('confirmationConnexion.twig', ['post' => $_POST, 'messageAuth' => $messageAuth, 'page' => $boutonRef]);