<?php 
    $current_page = $_SESSION['current_page'];
    // my-recipe.php
    if ($current_page != "my-recipe") {
        unset($_SESSION['myrecipe']);
    } else if (!isset($_SESSION['myrecipe'])){
        $_SESSION['myrecipe'] = 0;
    }
    // others-recipe.php
    if ($current_page != "others-recipe") {
        unset($_SESSION['othersRecipe']);
    } else if (!isset($_SESSION['othersRecipe'])){
        $_SESSION['othersRecipe'] = 0;
    }
    // category-page.php
    if ($current_page != "category-page") {
        unset($_SESSION['categoryPage']);
    } else if (!isset($_SESSION['categoryPage'])){
        $_SESSION['categoryPage'] = 0;
    }
    // saved-recipe.php
    if ($current_page != "saved-recipe") {
        unset($_SESSION['savedRecipe']);
    } else if (!isset($_SESSION['savedRecipe'])){
        $_SESSION['savedRecipe'] = 0;
    }
    // search-result.php
    if ($current_page != "search-result") {
        unset($_SESSION['search_result']);
        unset($_SESSION['search_result_data']);
        unset($_SESSION['search_key_word']);
    } else if (!isset($_SESSION['search_result'])){
        $_SESSION['search_result'] = 0;
    }
    // contact-us.php
    if ($current_page != "contact-us") {
        unset($_SESSION['contact_message']);
    }
?>    