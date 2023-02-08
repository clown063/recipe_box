<?php 
    if (!isset($_SESSION['top_recipe'])):
        $top_recipes = $sql->query("SELECT COUNT(user_id), food_id FROM likes GROUP BY food_id ORDER BY COUNT(user_id) DESC LIMIT 12");
        $top_recipes_array = array();
        while ($top = $top_recipes->fetch_assoc()):
            $top_recipes_array[] = $top;
        endwhile;
        if (COUNT($top_recipes_array) > 0):
            $_SESSION['top_recipe'] = $top_recipes_array;
        else:
            $_SESSION['top_recipe'] = 0;
        endif;
    endif;
?>    