<?php
    if (isset($_SESSION['user_id']) && !isset($_SESSION['category_data'])):   
        $user_id = $_SESSION['user_id'];
        $categoryData = $sql->query("SELECT COUNT(category), category FROM foods WHERE user_id = '$user_id' GROUP BY category ORDER BY COUNT(category) DESC");
        $category_array = array();
        while ($category = $categoryData->fetch_assoc()):
            $category_array[] = $category;
        endwhile;
        if (COUNT($category_array) > 0):
            $_SESSION['category_data'] = $category_array;
        else:
            $_SESSION['category_data'] = 0;
        endif;
    endif;
?>