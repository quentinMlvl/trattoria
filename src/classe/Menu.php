<?php

namespace classe;

class Menu{

    /**
    * Le menu est un singleton car il doit être accessible de partout
    */
    public static $menu = [];

    /**
     * Méthode ajoutant une recette au menu
     * @param AbstractRecipe : la recette à ajouter 
     */
    public static function addRecipe(AbstractRecipe $recipe){
        self::$menu[] = $recipe;
    }

    /**
     * Méthode supprimant une recette du menu
     * @param AbstractRecipe : la recette à supprimer 
     */
    public static function deleteRecipe(AbstractRecipe $recipe){
        if(in_array($recipe, self::$menu)){
            $key = array_search($recipe, self::$menu);
            unset(self::$menu[$key]);
        }else echo('Recette inexistante');
    }
    
    /**
     * Méthode retournant le fragmemnt HTML affichant le menu
     */
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
