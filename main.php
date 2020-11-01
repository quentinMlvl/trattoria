<?php


/*Autoload des classes*/
require_once('src/utils/AbstractClassLoader.php');
require_once('src/utils/ClassLoader.php');

$loader = new utils\ClassLoader('src');
$loader->register();


use classe\Menu;
use classe\PizzaRecipe;
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
$pizzaMarga = new PizzaRecipe("Pizza Margherita", [[$tomate,3],[$mozza,2]]);
$pizzaRegina = new PizzaRecipe("Pizza Regina", [[$tomate,3],[$mozza,2],[$champignon,5],[$jambon,3]]);
$pizzaHawai = new PizzaRecipe("Pizza Hawaïenne", [[$tomate,3],[$mozza,2],[$jambon,3],[$ananas, 5]]);

/* Suppression de la pizza Hawaïenne */
//PizzaRecipe::deleteRecipe($pizzaHawai);
// var_dump($pizzaHawai);

/* Ajout des recettes de pizzas au menu  */
Menu::addRecipe($pizzaRegina);
Menu::addRecipe($pizzaMarga);

/* Test de suppression de pizza du menu */
//Menu::deleteRecipe($pizzaMarga);

/* Affichage du menu */
echo(Menu::showMenu());

/* Création de la commande */
$commande = new Order(152);

/* Ajout de plats à la commande */
$commande->addRecipes($pizzaRegina, 5);
$commande->addRecipes($pizzaMarga, 4);

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
