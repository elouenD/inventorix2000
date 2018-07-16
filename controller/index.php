<?php
require_once("include.php");

if(isset($_SESSION['id'])){
    $session =  $_SESSION['id'];
    unset($_SESSION["id"]);
}
else {
    $session = "Rien";
}



echo $twig->render('index.twig', ['name' => "toto"]);
