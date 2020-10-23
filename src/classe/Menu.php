<?php

namespace classe;

class Menu{
    
    protected static $menu = [];

    protected static function modifyMenu(){

    }

    protected static function addRecipe(AbstractRecette $recette){
        self::$menu = [$recette];
    }

    protected function deleteRecipe(AbstractRecette $recette)
    {
        unset(self::$menu[$recette]);
    }
    
}
