<?php
require_once("include.php");
include('fonction.php');
include('./assets/pi_barcode.php');


// Set navigation
$nav = (object) ['accueil' => false, 'materiel' => false, 'emprunt' => false, 'utilisateur' => false, 'etudiant' => false,'codeBarre'=>true];

echo $twig->render('generatorCB.twig', ['name' => "page emprunt", 'autre' => "autre chose", 'nav' => $nav ]);


//Partie Generator  Code Barre 
$NbCodeAsk=0;
if(isset($_POST['code'])){
    $NbCodeAsk=$_POST['code'];        
}

$lastcode=111111111111;
$fichier='./assets/stock.txt';
//Checker le dernier code choisi

//OUVERTURE FICHIER 
$monfichier = fopen($fichier, 'r+');

$lastcode = fgets($monfichier);

fclose($monfichier);

//END CHECK 
$writeCode = $lastcode+$NbCodeAsk;

// instanciation

$bc = new pi_barcode();
for ($i=0;$i<$NbCodeAsk;$i++){
$code = $lastcode+$i;

// Le code a générer
$bc->setCode($code);
// Type de code : EAN, UPC, C39...
$bc->setType('EAN');
// taille de l'image (hauteur, largeur, zone calme)
//    Hauteur mini=15px
//    Largeur de l'image (ne peut être inférieure a
//        l'espace nécessaire au code barres
//    Zones Calmes (mini=10px) à gauche et à droite
//        des barres
$bc->setSize(80, 150, 10);
  
// Texte sous les barres :
//    'AUTO' : affiche la valeur du codes barres
//    '' : n'affiche pas de texte sous le code
//    'texte a afficher' : affiche un texte libre
//        sous les barres
$bc->setText('AUTO');
  
// Si elle est appelée, cette méthode désactive
// l'impression du Type de code (EAN, C128...)
$bc->hideCodeType();
  
// Couleurs des Barres, et du Fond au
// format '#rrggbb'
$bc->setColors('#123456', '#F9F9F9');
// Type de fichier : GIF ou PNG (par défaut)
$bc->setFiletype('PNG');
  
// envoie l'image dans un fichier
$bc->writeBarcodeFile('./assets/code/barcode'.$code.'.png');


}

//OUVERTURE FICHIER 
$monfichier = fopen($fichier, 'r+');
fseek($monfichier, 0);

fputs($monfichier, $writeCode);

fclose($monfichier);

//END CHECK 