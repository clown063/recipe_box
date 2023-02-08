<?php 
    if (!isset($_SESSION['everyoneData'])):
        $othersRecipe_data = $sql->query("SELECT * FROM foods WHERE visibility = 0 ORDER BY id DESC");
        $othersRecipe_array = array();
        while ($othersRecipe = $othersRecipe_data ->fetch_assoc()):
            $othersRecipe_array[] = $othersRecipe;
        endwhile; 
        if (COUNT($othersRecipe_array) > 0):
            $_SESSION['everyoneData'] = $othersRecipe_array;
        else:
            $_SESSION['everyoneData'] = 0;
        endif;
    endif;
?>    