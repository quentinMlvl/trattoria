<?php 

namespace classe\Recipe;
use classe\Ingredient;

    abstract class AbstractRecipe{
        public $name, $type, $ingredients=[],$price=0, $complexity, $duration; 

        public function __construct(string $val_name, array $val_ingr){
            $this->name = $val_name;
            foreach($val_ingr as $ingr){
                $this->addIngredient($ingr[0], $ingr[1]);
            }
        }

        /**
         * Méthode pour ajouter un ingrédient ou modifier sa quantité dans la recette
         * @param Ingredient : l'ingrédient à ajouter ou dont il faut modifier la quantité
         * @param string : la quantité de l'ingrédient
         */
        public function modifyRecipe(Ingredient $ingredient, string $quantity){
           
            $exist = false;

            foreach($this->ingredients as $k => $v){

                if(in_array($ingredient, $v)){
                    $this->ingredients[$k][1] = $quantity;
                    $exist = true;
                }
            }

            if(!$exist){
                $this->addIngredient($ingredient, $quantity);
            }
            
        }

        /**
         * Méthode pour ajouter un ingrédient (appelé dans le constructeur et dans modifyRecipe)
         * @param Ingredient : l'ingrédient à ajouter ou dont il faut modifier la quantité
         * @param string : la quantité de l'ingrédient
         */
        protected function addIngredient(Ingredient $ingredient, string $quantity){
            $this->ingredients[] = [$ingredient, $quantity];
        }

        /**
         * Méthode pour supprimer un ingrédient d'une recette
         * @param Ingredient : l'ingrédient à supprimer
         */
        public function deleteIngredient(Ingredient $ingredient){
            foreach($this->ingredients as $key => $value) {
                if($value[0] == $ingredient){
                    unset($this->ingredients[$key]);
                }
    
            }
        }

    }