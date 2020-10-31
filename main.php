<?php


/*Pour l'autoload de nos classes*/
require_once('src/utils/AbstractClassLoader.php');
require_once('src/utils/ClassLoader.php');

require_once('test.php');

$loader = new utils\ClassLoader('src');
$loader->register();


use classe\Menu;
use classe\Ingredient;
use classe\Order;

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

//Menu::deleteRecipe($pizza1);

echo(Menu::showMenu());

$commande = new Order('n°152');

$commande->addRecipes($pizza1, 5);
$commande->addRecipes($pizzaMarga, 4);

$commande->removeRecipes($pizzaMarga, 2);

var_dump($commande->recipes);

$commande->sendToKitchen();

$commande->orderReady();

$commande->orderTaken();

$commande->createBill();