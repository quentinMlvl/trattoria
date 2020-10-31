<?php


require_once('src/utils/AbstractClassLoader.php');
require_once('src/utils/ClassLoader.php');


// require_once('src/classe/AbstractRecipe.php');
// require_once('src/classe/PizzaRecipe.php');

$loader =  new utils\ClassLoader('src');
$loader->register();

use classe\PizzaRecipe;
use classe\Ingredient;
use classe\Menu;

$tomate = new Ingredient('tomate', 50);
$mozza = new Ingredient('mozza', 150);
$champignon = new Ingredient('champignon', 40);
$jambon = new Ingredient('jambon', 300);
$ananas = new Ingredient('ananas', 10);

$pizza1 = new PizzaRecipe("test pizza", [[$tomate,3],[$mozza,2]]);
$pizzaMarga = new PizzaRecipe("Pizza Margherita", [[$tomate,3],[$mozza,2],[$champignon,5],[$jambon,3]]);
$testRec = new PizzaRecipe("Pizza Test", [[$tomate,3],[$mozza,2],[$jambon,3]]);
//PizzaRecipe::deleteRecipe($testRec);
// var_dump($testRec);

    
   $pizza1->modifyQuantity($tomate, 165);
//    var_dump($pizza1->ingredients[0]);
    echo("<br><br>");

$testRec->addIngredient($ananas, 2);
var_dump($testRec);

echo("<br><br>");

$testRec->deleteIngredient($jambon);
var_dump($testRec);

echo("<br><br>");
Menu::showMenu();