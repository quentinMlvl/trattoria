<?php 
    namespace classe\Recipe;

    class PizzaRecipe extends AbstractRecipe{

        public $type = 'Pizza';

        public $base;

        public function __construct(string $val_name, array $val_ingr, string $val_base){
            parent::__construct($val_name, $val_ingr);
            $this->base = $val_base;
        } 

        
        /**
         * Méthode pour mettre la pizza en calzone
         */
        public function isCalzone(){
            $this->calzone = true;
        }

    }