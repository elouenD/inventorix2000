/**
 * Created by PhpStorm.
 * User: elouen
 * Date: 16/07/18
 * Time: 09:49
 */
<?php
require_once("include.php");
include("fonction.php");

if(isset($_SESSION['id'])){
    
    $etudiant = new utilisateur(
        '',
        $_POST["nom"],
        $_POST["prenom"],
        $_POST["mail"],
        $_POST["login"],
        $_POST["mdp"],
        ''
        );
    
    createEtudiant($etudiant);
   
    print_r($etudiant);
  
    echo $twig->render('confirmationEtudiant.twig', ['post' => $_POST]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}



