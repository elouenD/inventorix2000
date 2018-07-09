<?php
require_once("./include.php");

echo $twig->render('/main.twig', ['titleName' => "Dashboard"]);