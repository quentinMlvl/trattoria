<?php


/*Autoload des classes*/
require_once('src/utils/AbstractClassLoader.php');
require_once('src/utils/ClassLoader.php');

$loader = new utils\ClassLoader('src');
$loader->register();


use classe\Menu;
use classe\Recipe\PizzaRecipe;
use classe\Recipe\PastaRecipe;
use classe\Order;
use classe\Ingredient;

/* Création des ingrédients*/
$tomate = new Ingredient('tomate', 50);
$mozza = new Ingredient('mozza', 150);
$champignon = new Ingredient('champignon', 40);
$jambon = new Ingredient('jambon', 300);
$ananas = new Ingredient('ananas', 10);


/* Test avec afficahge des ingrédients et changement du statut du stock*/
//var_dump($mozza);
//$tomate->modifyStock();
//var_dump($tomate);


/* Création de recettes de Pizza */
$pizzaMarga = new PizzaRecipe("Pizza Margherita", [[$tomate,3],[$mozza,2]], 'Tomate');
$pizzaRegina = new PizzaRecipe("Pizza Regina", [[$tomate,3],[$mozza,2],[$champignon,5],[$jambon,3]], 'Tomate');
$pizzaHawai = new PizzaRecipe("Pizza Hawaïenne", [[$tomate,3],[$mozza,2],[$jambon,3]], 'Tomate');
$pizzaCreme = new PizzaRecipe("Pizza Creme", [[$mozza,2],[$jambon,3],[$champignon, 5]], 'Crème');

$pateCarbo = new PastaRecipe("Spaghetti Carbo", [[$tomate, 5], [$jambon, 4]], 'Spaghetti');
$lasagnes = new PastaRecipe("Lasagnes", [[$tomate, 5], [$jambon, 4]], 'Lasagnes');

/* Suppression de la pizza Hawaïenne */
/* Pas d'autre possibilité pour supprimer l'instance d'une classe Avec une méthode il y a un problème de scope */
//unset($pizzaRegina);


/* Test d'ajout d'ingrédient*/
$pizzaHawai->modifyRecipe($ananas, 2);
//var_dump($pizzaHawai->ingredients);


/* Test de modification de quantité*/
$pizzaMarga->modifyRecipe($tomate, 8);
//var_dump($pizzaMarga->ingredients);


/* Test de suppression de la tomate dans la pizza Regina */
//$pizzaRegina->deleteIngredient($tomate);
//var_dump($pizzaRegina);


/* Test ajout Calzone*/
//$pizzaHawai->isCalzone();
//var_dump($pizzaHawai->ingredients);


/* Ajout des recettes de pizzas au menu  */
Menu::addRecipe($pizzaRegina);
Menu::addRecipe($pizzaMarga);
Menu::addRecipe($pizzaCreme);
Menu::addRecipe($lasagnes);
Menu::addRecipe($pateCarbo);


/* Test de suppression de pizza du menu */
//Menu::deleteRecipe($pizzaMarga);


/* Affichage du menu */
Menu::showMenu();


/* Création de la commande */
$commande = new Order(152);


/* Ajout de plats à la commande */
$commande->addRecipes($pizzaRegina, 5);
$commande->addRecipes($pizzaMarga, 4);
$commande->addRecipes($lasagnes, 2);


/* Retire des plats de la commande */
$commande->removeRecipes($pizzaMarga, 2);


/* Affichage des plats de la commande */
//var_dump($commande->recipes);


/* Envoi de la commande à la cuisine */
$commande->sendToKitchen();


/* Annonce de la cuisine que la commande est prête à être servi */
$commande->orderReady();


/* Serveur prend les plats en cuisine et sert la commande */
$commande->orderTaken();


/* Création de la facture (pas implémenté) */
$commande->createBill();


/* Test de rupture de stock avec suppression des recettes contenant des champignons du menu */

$champignon->alertStock();

echo '<hr>';

$champignon->modifyStock();

Menu::showMenu();