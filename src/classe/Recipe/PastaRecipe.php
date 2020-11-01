<?php 
    namespace classe\Recipe;

    class PastaRecipe extends AbstractRecipe{

        public $type = 'Pasta';
        public $pasta_type;
        
        public function __construct(string $val_name, array $val_ingr, string $val_pate){
            parent::__construct($val_name, $val_ingr);
            $this->pasta_type=$val_pate;
        }
    }