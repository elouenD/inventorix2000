<?php
require_once("./include.php");

echo $twig->render('listeLivres.twig', ['name' => "toto"]);



$list[] = array("C++ débutants", "Programmation", 75);
$list[] = array("C débutants", "Programmation Informatique", 45);
$list[] = array("Java", "Programmation OO", 85);
$list[] = array("Php débutants", "Programmation Web", 36);

//echo $twig->render('listeLivres.twig', ['list' => $list]);
