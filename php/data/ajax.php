<?php
    // Start the session
    session_start();
    // Server connection
    include 'connection.php';
    // Everyone data
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
    // GET THE NUMBER OF LIKES EACH 
    if (isset($_SESSION['numberOfLikes'])):
        $originalLikes = $_SESSION['numberOfLikes'];
    endif;
    $numberOfLikes = $sql->query("SELECT COUNT(user_id), food_id FROM likes GROUP BY food_id ORDER BY (food_id) DESC");
    $numberOfLikes_array = array();
    while ($likes = $numberOfLikes->fetch_assoc()):
        $numberOfLikes_array[] = $likes;
    endwhile;
    $_SESSION['numberOfLikes'] = $numberOfLikes_array;
    $numberOfLikes_data = $_SESSION['numberOfLikes'];
    $top_recipes = $sql->query("SELECT COUNT(user_id), food_id FROM likes GROUP BY food_id ORDER BY COUNT(user_id) DESC LIMIT 40");
    $top_recipes_array = array();
    while ($top = $top_recipes->fetch_assoc()):
        $top_recipes_array[] = $top;
    endwhile;
    if (COUNT($top_recipes_array) > 0):
        $_SESSION['top_recipe'] = $top_recipes_array;
    else:
        $_SESSION['top_recipe'] = 0;
    endif;
?>