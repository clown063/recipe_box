<?php
    // Session start
    session_start();
    if (isset($_GET['page']) && $_GET['message']):
        $page_num = intval($_GET['message']) -1;
        // Get the page
        $page = $_GET['page'];
        // Actin for each page
        if ($page == "saved-recipe"):
            $_SESSION['savedRecipe'] = $page_num;
            header("Location: ../../saved-recipe.php");
        elseif ($page == "my-recipe"):
            $_SESSION['my-recipe'] = $page_num;
            header("Location: ../../my-recipe.php");
        elseif ($page == "category-page"):
            $_SESSION['categoryPage'] = $page_num;
            header("Location: ../../category-page.php");
        elseif ($page == "others-recipe"):
            $_SESSION['othersRecipe'] = $page_num;
            header("Location: ../../others-recipe.php");
        elseif ($page == "search-result"):
            $_SESSION['search_result'] = $page_num;
            header("Location: ../../search-result.php");
        endif;
    endif;
?>