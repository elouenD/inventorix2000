<?php
require_once("../_lib/vendor/autoload.php");
assert(__DIR__ . '/view');
$loader = new \Twig_Loader_Filesystem(__DIR__ . '/view');
$twig = new \Twig_Environment($loader);