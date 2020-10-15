<?php


/*Pour l'autoload de nos classes*/
require_once('src/utils/AbstractClassLoader.php');
require_once('src/utils/ClassLoader.php');
$loader = new utils\ClassLoader('src');
$loader->register();


use classe\Ingredient;

$tomate = new Ingredient('tomate', 50);

echo($tomate->nom);
