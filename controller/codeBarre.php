<?php
require_once("include.php");
include('fonction.php');
include('./assets/pi_barcode.php');


// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => true, 'utilisateur' => false, 'etudiant' => false];

echo $twig->render('codeBarre.twig', ['name' => "page emprunt", 'autre' => "autre chose", 'nav' => $nav ]);

