<?php


/*Pour l'autoload de nos classes*/
require_once('src/utils/AbstractClassLoader.php');
require_once('src/utils/ClassLoader.php');

require_once('test.php');

$loader = new utils\ClassLoader('src');
$loader->register();


use classe\Menu;
use classe\Ingredient;

/* TEST ingrédient*/
$tomate = new Ingredient('tomate', 50);
$mozza = new Ingredient('mozza', 150);

/*
var_dump($mozza);
$tomate->modifyStock();
var_dump($tomate);
*/

Menu::addRecipe($pizza1);
Menu::addRecipe($pizzaMarga);
Menu::addRecipe($testRec);
/*
Menu::deleteRecipe($pizza1);
*/
echo(Menu::showMenu());