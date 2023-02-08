<?php
    // Session start
    session_start();
    if (isset($_GET['page']) && $_GET['message']):
        // count variabele is set to zero
        $count = 0;
        // Get the page
        $page = $_GET['page'];
        // Actin for each page
        if ($page == "saved-recipe"):
            if ($_GET['message'] == 'go'):
                $count = $_SESSION['savedRecipe'];
                $count ++;
            elseif ($_GET['message'] == 'back'):
                $count = $_SESSION['savedRecipe'];
                $count --;
            endif;

            if ($count <= 0):
                $_SESSION['savedRecipe'] = 0;
            else:
                $_SESSION['savedRecipe'] = $count;
            endif;
    
            header("Location: ../../saved-recipe.php");
        elseif ($page == "my-recipe"):
            if ($_GET['message'] == 'go'):
                $count = $_SESSION['myrecipe'];
                $count ++;
            elseif ($_GET['message'] == 'back'):
                $count = $_SESSION['myrecipe'];
                $count --;
            endif;
    
            if ($count <= 0):
                $_SESSION['myrecipe'] = 0;
            else:
                $_SESSION['myrecipe'] = $count;
            endif;
    
            header("Location: ../../my-recipe.php");
        elseif ($page == "category"):
            if ($_GET['message'] == 'go'):
                $count = $_SESSION['categoryRecipe'];
                $count ++;
            elseif ($_GET['message'] == 'back'):
                $count = $_SESSION['categoryRecipe'];
                $count --;
            endif;
    
            if ($count <= 0):
                $_SESSION['categoryRecipe'] = 0;
            else:
                $_SESSION['categoryRecipe'] = $count;
            endif;
    
            header("Location: ../../category.php");
        elseif ($page == "category-page"):
            if ($_GET['message'] == 'go'):
                $count = $_SESSION['categoryPage'];
                $count ++;
            elseif ($_GET['message'] == 'back'):
                $count = $_SESSION['categoryPage'];
                $count --;
            endif;
    
            if ($count <= 0):
                $_SESSION['categoryPage'] = 0;
            else:
                $_SESSION['categoryPage'] = $count;
            endif;
    
            header("Location: ../../category-page.php");
        elseif ($page == "others-recipe"):
            if ($_GET['message'] == 'go'):
                $count = $_SESSION['othersRecipe'];
                $count ++;
            elseif ($_GET['message'] == 'back'):
                $count = $_SESSION['othersRecipe'];
                $count --;
            endif;
    
            if ($count <= 0):
                $_SESSION['othersRecipe'] = 0;
            else:
                $_SESSION['othersRecipe'] = $count;
            endif;

            header("Location: ../../others-recipe.php");
        elseif ($page == "search-result"):
            if ($_GET['message'] == 'go'):
                $count = $_SESSION['search_result'];
                $count ++;
            elseif ($_GET['message'] == 'back'):
                $count = $_SESSION['search_result'];
                $count --;
            endif;
    
            if ($count <= 0):
                $_SESSION['search_result'] = 0;
            else:
                $_SESSION['search_result'] = $count;
            endif;

            header("Location: ../../search-result.php");
        endif;
    endif;
?>