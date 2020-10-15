<?php

namespace classe;

class Ingredient {

    protected $nom, $prix_unit, $qty_stock;

    protected static $stock = []; 

    public function __construct(string $val_nom, string $val_qty)
    {
        $this->nom = $val_nom;
        $this->qty_stock = $val_qty;
        $this->ajouterStock();
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    private function ajouterStock()
    {
        self::$stock = [$this->name => $this->qty_stock];
    }

}