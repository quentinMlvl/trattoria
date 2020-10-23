<?php


require_once('src/utils/AbstractClassLoader.php');
require_once('src/utils/ClassLoader.php');


// require_once('src/classe/AbstractRecipe.php');
// require_once('src/classe/PizzaRecipe.php');

$loader =  new utils\ClassLoader('src');
$loader->register();

use classe\PizzaRecipe;
use classe\Ingredient;

$tomate = new Ingredient('tomate', 50);
$mozza = new Ingredient('mozza', 150);

$pizza1 = new PizzaRecipe("test pizza", [[$tomate,3],[$mozza,2]]);

    // var_dump($pizza1);

    
    $pizza1->modifyQuantity($tomate, 165);
    var_dump($pizza1->ingredients[0]);