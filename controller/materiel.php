<?php
require_once("../_lib/vendor/autoload.php");
$loader = new \Twig_Loader_Filesystem(__DIR__.'/view');
$twig = new \Twig_Environment($loader);
echo $twig->render('materiel.twig', ['name' => "hello"]);
