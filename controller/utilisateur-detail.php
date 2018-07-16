<?php
require_once("include.php");
require("fonction.php");

<<<<<<< HEAD


if(isset($_SESSION['id'])){
    // Set navigation
    $nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => true, 'etudiant' => false];
    
    $id = $_GET['id'];
    $userInfo=userInfospec($id);
    
    echo $twig->render('utilisateur-detail.twig', ['id' => $id, 'nav' => $nav, 'userInfo'=> $userInfo[0]]);
}
else{
    echo '<a href="index.php">Vous n etes pas connecte(e)</a>';
    $urlprofil="index.php";
    $session = "Rien";
}




=======
if(isset($_GET['idToDelete'])){
    $idToDelete = $_GET['idToDelete'];
    echo("test");
    deleteUser($idToDelete);
} else if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $userInfo=userInfospec($id);
}
echo $twig->render('utilisateur-detail.twig', ['id' => $id, 'nav' => $nav, 'userInfo'=> $userInfo[0]]);
>>>>>>> 7aa114209208ebc18642be35bd5fd0a3cd5af49f
