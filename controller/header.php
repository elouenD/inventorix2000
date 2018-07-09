<?php
require_once("include.php");
echo $twig->render('view/index.twig', ['applicationName' => "Biblio Paris"]);
