<?php 
    session_start();
    if (isset($_SESSION['user_id'])):
        if (isset($_GET['food_id']) && $_GET['page']):
            $users_id = $_SESSION['user_id'];
            $food_id =  $_GET['food_id'];
            $page = $_GET['page'];
            // Server connection
            include 'connection.php';
            // Make sure so that user cannot like second time on the same content and delete for the second time
            $likeDuplicateCheck = $sql->query("SELECT * FROM likes WHERE user_id = $users_id AND food_id = $food_id");
            if (mysqli_num_rows($likeDuplicateCheck) > 0):
                $sql->query("DELETE FROM likes WHERE food_id = $food_id AND user_id = $users_id");
            else:
                $sql->query("INSERT INTO likes (food_id, user_id) VALUES ($food_id, $users_id)");
            endif;
            // Unset likings
            unset($_SESSION['numberOfLikes']);
            unset($_SESSION['yourlikings']);
            // Unset Top Recipe
            unset($_SESSION['top_recipe']);
            // Redirect
            if ($page == "my-recipe") {
                header("Location: ../../my-recipe.php");
            } elseif ($page == "others-recipe") {
                header("Location: ../../others-recipe.php");
            } elseif ($page == "top-recipe") {
                header("Location: ../../top-recipe-sites.php");
            } elseif ($page == "index") {
                header("Location: ../../index.php");
            } elseif ($page == "category-page") {
                header("Location: ../../category-page.php");
            } elseif ($page == "search-result") {
                header("Location: ../../search-result.php");
            } elseif ($page == "saved-recipe") {
                header("Location: ../../saved-recipe.php");
            }
        endif;
    endif;
?>