<?php
require_once("include.php");
include("fonction.php");





//insertion en base 
if (isset($_POST["description"])){
updateMateriel($_POST["description"],$_POST["updateDesc"]);
}
echo $twig->render('confirmationMateriel.twig', ['post' => $_POST]);