<?php
    if (isset($_SESSION['user_id'])): 
        $user_id = $_SESSION['user_id'];
        if (!isset($_SESSION['savedRecipe_data'])):
            // Get the saved recipe's data
            $saved_recipes = $sql->query("SELECT * FROM saved WHERE user_id = $user_id ORDER BY id DESC");
            $saved_recipes_array = array();
            while ($saved = $saved_recipes->fetch_assoc()):
                $saved_recipes_array[] = $saved;
            endwhile; 
            if (COUNT($saved_recipes_array) > 0):
                $_SESSION['savedRecipe_data'] = $saved_recipes_array;
            else:
                $_SESSION['savedRecipe_data'] = 0;
            endif;
        endif;
        if (!isset($_SESSION['savedEveryone_data'])):
             // Get the recipes which is including the one that you uploaded with private mode
            $savedEveryoneData = $sql->query("SELECT * FROM foods WHERE visibility = 0 ORDER BY id DESC");
            $savedEveryoneData_array = array();
            while ($he = $savedEveryoneData->fetch_assoc()):
                $savedEveryoneData_array[] = $he;
            endwhile; 
            $my_saved_recipe = $sql->query("SELECT * FROM foods WHERE visibility = 1 AND user_id = $user_id");
            while ($my_saved = $my_saved_recipe->fetch_assoc()):
                array_push($savedEveryoneData_array, $my_saved);
            endwhile;
            if (COUNT($savedEveryoneData_array) > 0):
                $_SESSION['savedEveryone_data'] = $savedEveryoneData_array;
            else:
                $_SESSION['savedEveryone_data'] = 0;
            endif;
        endif;
    endif;
?>    