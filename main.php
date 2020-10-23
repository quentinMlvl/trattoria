<?php


/*Pour l'autoload de nos classes*/
require_once('src/utils/AbstractClassLoader.php');
require_once('src/utils/ClassLoader.php');
$loader = new utils\ClassLoader('src');
$loader->register();


use classe\Ingredient;

$tomate = new Ingredient('tomate', 50);
$mozza = new Ingredient('mozza', 150);

var_dump($tomate);
var_dump($mozza);

$tomate->modifyStock();

var_dump(Ingredient::$stock);