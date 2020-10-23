<?php 
    namespace classe;

    abstract class AbstractRecipe{
        public $name, $type, $ingredients=[],$price, $complexity, $duration; 
        
        public function __construct(string $val_name, array $val_ingr){
            $this->name = $val_name;
            foreach($val_ingr as $ingr){
                $this->addIngredient($ingr[0], $ingr[1]);
            }
        }

        protected function modifyRecipe(string $name){
            /*
            * Coder la fonction afin de modifier une recette EXISTANTE grace au nom
            */
        }

        protected function deleteRecipe(string $name){
            /*
            * Coder la fonction afin de supprimer une recette EXISTANTE grace au nom
            */
        }

        public function addIngredient(Ingredient $ingredient, string $quantity){
            /*
            * Coder la fonction afin d'ajouter un ingrédient ainsi que sa quantité
            * !!! PRECISER $ingr COMME OBJET DE CLASSE Ingredient !!! 
            */
            $this->ingredients[] = [$ingredient, $quantity];
        }

        public function modifyQuantity(Ingredient $ingredient, string $quantity){
            /*
            * Coder la fonction afin de modifier un ingrédient ainsi que sa quantité
            * !!! PRECISER $ingr COMME OBJET DE CLASSE Ingredient !!! 
            */
            foreach($this->ingredients as $k => $v){
                if(in_array($ingredient, $v)){
                    $this->ingredients[$k][1] = $quantity;
                    break;
                }else echo "$ingredient->name n'est pas dans la recette";
            }
        }

        protected function deleteIngredient($ingredient){
            /*
            * Coder la fonction afin de supprimer un ingrédient EXISTANT
            * !!! PRECISER $ingr COMME OBJET DE CLASSE Ingredient !!! 
            */
        }

    }