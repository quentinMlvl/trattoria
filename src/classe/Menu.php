<?php

namespace classe;

class Menu{
    
    protected static $menu = [];

    protected static function modifyMenu(){

    }

    public static function addRecipe(AbstractRecipe $recipe){
        self::$menu[] = $recipe;
    }

    public static function deleteRecipe(AbstractRecipe $recipe){
        //var_dump(self::$menu[$recette]);        
            $key = array_search($recipe, self::$menu);
            unset(self::$menu[$key]);
            //}else echo "$recipe n'est pas dans le menu";
    }
    
    public static function showMenu(){
        //var_dump(self::$menu);

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
