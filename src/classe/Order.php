<?php

namespace classe;

class Order{

    protected $state, $table; 
    public $recipes = [];

    public function __construct($val_table){
        $this->table = $val_table;
        $this->state = 'ongoing';
    }

    public function addRecipes(AbstractRecipe $recipe, $number = 1)
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

            // else{
                
            //     echo "recette est pas le commande";
                
            //     $this->recipes[] = [$recipe, $number];   
            // }
        }else echo "la recette n'est pas dans le menu";
    }

    public function removeRecipes(AbstractRecipe $recipe, $number = 1)
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

    public function sendToKitchen()
    {
        if ($this->state == 'ongoing') {
            $this->state = 'in preparation';

            $chaine = "";
            
            foreach ($this->recipes as $recipe) {
                $chaine .= $recipe[0]->name . " : " . $recipe[1] . "<br>";
            }

            echo("<hr>
                <em>(À la cuisine)</em>
                <h2>Commande de la table $this->table</h2>
                $chaine 
            ");
        }
        

        
    }

    public function orderReady(){

        if($this->state == 'in preparation'){
            $this->state = 'ready';
            echo("<hr>
            <em>(De la cuisine aux serveurs)</em>
            <h2>Commande de la table $this->table prête</h2>
            ");
           }

    }

    public function orderTaken(){

        if ($this->state == 'ready') {
            $this->state = 'ongoing';
            echo("<hr>
            <em>(Aux serveurs)</em>
            <h2>Commande de la table $this->table servie</h2>
            ");
        }
        
    }

    public function createBill()
    {
        if($this->state == 'ongoing'){
            
            $this->state == 'finished';

            echo("<hr>
            <em>(Aux serveurs)</em>
            <h2>New Bill (not implemented yet)</h2>
            ");
        }
    }

}