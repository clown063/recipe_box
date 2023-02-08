<?php
    if (isset($_SESSION['numberOfLikes'])):
        $numberOfLikes_data = $_SESSION['numberOfLikes'];
    else:
        // GET THE NUMBER OF LIKES EACH 
        $numberOfLikes = $sql->query("SELECT COUNT(user_id), food_id FROM likes GROUP BY food_id ORDER BY (food_id) DESC");
        $numberOfLikes_array = array();
        while ($likes = $numberOfLikes->fetch_assoc()):
            $numberOfLikes_array[] = $likes;
        endwhile;
        $_SESSION['numberOfLikes'] = $numberOfLikes_array;
        $numberOfLikes_data = $_SESSION['numberOfLikes'];
    endif;
?>    