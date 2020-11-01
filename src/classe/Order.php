<?php

namespace classe;

use classe\Recipe\AbstractRecipe;

class Order{

    protected $state, $table; 
    public $recipes = [];

    public function __construct(int $val_table){
        $this->table = $val_table;
        $this->state = 'ongoing';
    }


    /**
     * Méthode ajoutant des plats à la commande   
     * @param AbstractRecipe : le plat à ajouter
     * @param int : le nombre (optionnel sinon = 1)
     */
    public function addRecipes(AbstractRecipe $recipe, int $number = 1)
    {
        if(in_array($recipe, Menu::$menu)){

            if(count($this->recipes)){

                $exist=false;
                foreach($this->recipes as $key => $value) {

                    if(($value[0] == $recipe)){
                        $this->recipes[$key][1] = $value[1]+$number;
                        $exist=true;
                    }
                }
                if(!$exist){
                    $this->recipes[] = [$recipe, $number];
                }
            }else{
                $this->recipes[] = [$recipe, $number];
            };
        }else echo "la recette n'est pas dans le menu";
    }

    /**
     * Méthode supprimant des plats de la commande
     * @param AbstractRecipe : le plat à ajouter
     * @param int : le nombre (optionnel sinon = 1)
     */
    public function removeRecipes(AbstractRecipe $recipe,int $number = 1)
    {
        foreach($this->recipes as $key => $value) {

            if($value[0] == $recipe){
                if($value[1]-$number>0){
                    $this->recipes[$key][1] = $value[1]-$number;
                }else{
                    unset($this->recipes[$key]);
                }

            }
        }
    }

    /**
     * Méthode envoyant la commande à la cuisine en l'affichant
     * Afin qu'elle puisse cuisiner les plats de la commande
     */
    public function sendToKitchen()
    {
        if ($this->state == 'ongoing') {
            $this->state = 'in preparation';

            $chaine = "";
            
            foreach ($this->recipes as $recipe) {
                $chaine .= $recipe[0]->name . " : " . $recipe[1] . "<br>";
            }

            echo("<br><hr>
                <em>(Du serveur à la cuisine)</em>
                <h2>Commande de la table $this->table à préparer</h2>
                $chaine 
            ");
        }
        

        
    }

    /**
     * Méthode qui permet à la cuisine de notifier les serveurs que les plats sont prêts
     * Afin qu'ils puissent être servis
     */
    public function orderReady(){

        if($this->state == 'in preparation'){
            $this->state = 'ready';
            echo("<br><hr>
            <em>(De la cuisine aux serveurs)</em>
            <h2>Commande de la table $this->table prête</h2>
            ");
           }

    }

    /**
     * Méthode lorsque le serveur a pris les plats et les a servi
     * Afin de pouvoir reprendre la commande ou de créer une facture 
     */
    public function orderTaken(){

        if ($this->state == 'ready') {
            $this->state = 'ongoing';
            echo("<br><hr>
            <em>(Du serveur prenant les plats de la commande)</em>
            <h2>Commande de la table $this->table servie</h2>
            ");
        }
        
    }

    /**
     * Méthode permettant de créer une facture
     * Afin d'encaisser le client
     */
    public function createBill()
    {
        if($this->state == 'ongoing'){
            
            $this->state == 'finished';

            echo("<br><hr>
            <em>(Du serveur)</em>
            <h2>New Bill (not implemented yet)</h2>
            ");
        }
    }

}