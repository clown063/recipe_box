<?php 
    session_start();
    if (isset($_SESSION['user_id']) && isset($_GET['food_id']) && isset($_GET['page'])):
        // Server connection
        include 'connection.php';
        // Get the user id
        $users_id = $_SESSION['user_id'];
        // Get the sent data
        $food_id =  $_GET['food_id'];
        $page = $_GET['page'];
        // Check whether it's already saved or not
        $savedDuplicateCheck = $sql->query("SELECT * FROM saved WHERE user_id = $users_id AND food_id = $food_id");
        // Action provide for each situation
        if (mysqli_num_rows($savedDuplicateCheck) > 0):
            $sql->query("DELETE FROM saved WHERE food_id = $food_id AND user_id = $users_id");
        else:
            $sql->query("INSERT INTO saved (food_id, user_id) VALUES ($food_id, $users_id)");
        endif;
        // Unset the your saving
        unset($_SESSION['yoursaving']);
        // Unset saving
        unset($_SESSION['savedRecipe_data']);
        unset($_SESSION['savedEveryone_data']);
        // Call them
        include '../initial-setting/saved-recipe.php';
        include '../initial-setting/yoursaving.php';
        // Redirect
        if ($page == "my-recipe"):
            header("Location: ../../my-recipe.php");
        elseif ($page == "others-recipe"):
            header("Location: ../../others-recipe.php");
        elseif ($page == "top-recipe"):
            header("Location: ../../top-recipe-sites.php");
        elseif ($page == "index"):
            header("Location: ../../index.php");
        elseif ($page == "category-page"):
            header("Location: ../../category-page.php");
        elseif ($page == "search-result"):
            header("Location: ../../search-result.php");
        elseif ($page == "saved-recipe"):
            header("Location: ../../saved-recipe.php");
        endif;
    endif;
?>