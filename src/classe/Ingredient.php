<?php

namespace classe;

class Ingredient {

    protected $name, $price;

    public static $stock = [];

    public function __construct(string $val_name, int $val_price)
    {
        $this->name = $val_name;
        $this->price = $val_price;
        self::$stock[$this->name] = true;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function modifyStock()
    {
        if (self::$stock[$this->name]) {
            self::$stock[$this->name] = false;
        }else{
            self::$stock[$this->name]=true;
        }
        var_dump(self::$stock[$this->name]);
    }

}