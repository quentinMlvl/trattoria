<?php
    require_once('src/classe/AbstractRecette.php');
    require_once('src/classe/Recette.php');

    $pizza1 = new Recette("test pizza");

    var_dump($pizza1);