<?php 
    if (isset($_SESSION['user_id']) && !isset($_SESSION['food_data'])):
        // Assign to variable
        $user_id = $_SESSION['user_id'];
        // Get the data  
        $myRecipe_data = $sql->query("SELECT * FROM foods WHERE user_id = '$user_id' ORDER BY id DESC");
        $myRecipe_array = array();
        while ($myrecipe = $myRecipe_data->fetch_assoc()):
            $myRecipe_array[] = $myrecipe;
        endwhile;
        if (COUNT($myRecipe_array) > 0):
            $_SESSION['food_data'] = $myRecipe_array;
        else:
            $_SESSION['food_data'] = 0;
        endif;
    endif;    
?>    