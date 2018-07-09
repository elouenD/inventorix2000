<?php
require_once("./include.php");

echo $twig->render('listeLivres.twig', ['name' => "toto"]);

$bdd = new PDO('mysql:host="lebonangle.ddns.net/phpmyadmin";dbname=base_php;charset=utf8', 'root', 'Pr0jet');
$user = $bdd->query('SELECT * FROM `utilisateur` ');
$datauser = $user->fetch();

$materiel = $bdd->query('SELECT * FROM `materiel` ');
$datamateriel = $materiel->fetch();


$pret = $bdd->query('SELECT * FROM `pret` ');
$datapret = $pret->fetch();


$fournisseur = $bdd->query('SELECT * FROM `fournisseur` ');
$datafournisseur = $fournisseur->fetch();




$list[] = array("C++ débutants", "Programmation", 75);
$list[] = array("C débutants", "Programmation Informatique", 45);
$list[] = array("Java", "Programmation OO", 85);
$list[] = array("Php débutants", "Programmation Web", 36);

//echo $twig->render('listeLivres.twig', ['list' => $list]);
