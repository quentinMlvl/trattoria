<?php

namespace classe;

class Menu{
    
    public static $menu = [];

    public static function addRecipe(AbstractRecipe $recipe){
        self::$menu[] = $recipe;
    }

    public static function deleteRecipe(AbstractRecipe $recipe){
        if(in_array($recipe, self::$menu)){
            $key = array_search($recipe, self::$menu);
            unset(self::$menu[$key]);
        }else echo('Recette inexistante');
    }
    
    public static function showMenu(){
        $stringMenu = '';

        foreach(self::$menu as $recipe){

            $stringIngr = '';

            foreach($recipe->ingredients as $ingredient){
                $stringIngr .= $ingredient[0]->name . " ";
            }

            $stringMenu .= <<<EOT
<div>
    <h2>$recipe->name ......... $recipe->price €</h2>
    <em>$stringIngr</em>            
</div>  
EOT;
        }

        return $stringMenu;
    }
    
}
