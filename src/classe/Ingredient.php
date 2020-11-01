<?php

namespace classe;

class Ingredient {

    protected $name, $price;

    protected $stock = [];

    /**
     * Constructeur
     * @param string : le nom de l'ingrédient
     * @param int : le prix unitaire de l'ingrédient
     */
    public function __construct(string $val_name, int $val_price)
    {
        $this->name = $val_name;
        $this->price = $val_price;
        $this->stock[$this->name] = true;
    }


    public function __get($name){
        return $this->$name;   
    }


    /**
     * Méthode modifiant le statut du stock
     */
    public function modifyStock()
    {
        if ($this->stock[$this->name]) {
            $this->stock[$this->name] = false;
        }else{
            $this->stock[$this->name]=true;
        }
    }

}