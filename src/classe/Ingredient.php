<?php

namespace classe;

class Ingredient {

    protected $name, $price;

    protected $stock;

    /**
     * Constructeur
     * @param string : le nom de l'ingrédient
     * @param int : le prix unitaire de l'ingrédient
     */
    public function __construct(string $val_name, int $val_price)
    {
        $this->name = $val_name;
        $this->price = $val_price;
        $this->stock = true;
    }


    public function __get($name){
        return $this->$name;   
    }

    /**
     * Méthode permettant aux cuisines de signaler un manque de stock au patron
     */
    public function alertStock(){
        if ($this->stock) {
            echo "<br><hr><h2>Rupture de stock de $this->name !!!</h2>";
        }
    }

    /**
     * Méthode modifiant le statut du stock
     */
    public function modifyStock()
    {
        if ($this->stock) {
            $this->stock = false;

            foreach (Menu::$menu as $key => $recipe) {
                    foreach($recipe->ingredients as $v){
                        if(in_array($this, $v)){
                            unset(Menu::$menu[$key]);
                        }
                    }
            }

        }else{
            $this->stock = true;
        }
    }

}