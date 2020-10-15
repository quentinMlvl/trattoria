<?php 
    namespace classe;

    abstract class Recette{
        protected $recette, $nom, $type, $ingredients=[],$prix, $complex, $duree; 
        
        public function __construct(string $val_nom){
            $this->nom = $val_nom;
        }

        protected function modRecette(string $nom){
            /*
            * Coder la fonction afin d'ajouter une recette EXISTANTE grace au nom
            */
        }

        protected function supprRecette(string $nom){
            /*
            * Coder la fonction afin de supprimer une recette EXISTANTE grace au nom
            */
        }

        protected function ajoutIngr($ingr, string $quantity){
            /*
            * Coder la fonction afin d'ajouter un ingrédient ainsi que sa quantité
            * !!! PRECISER $ingr COMME OBJET DE CLASSE Ingredient !!! 
            */
        }

        protected function supprIngr(string $nom){
            /*
            * Coder la fonction afin de supprimer un ingrédient EXISTANT
            */
        }

    }