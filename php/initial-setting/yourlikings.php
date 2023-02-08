<?php 
    if (isset($_SESSION['user_id']) && !isset($_SESSION['yourlikings'])):
        $user_id = $_SESSION['user_id'];
        $yourlikings = $sql->query("SELECT * FROM likes WHERE user_id = $user_id");
        $yourlikings_array = array();
        while ($your = $yourlikings->fetch_assoc()):
            $yourlikings_array[] = $your;
        endwhile;
        $_SESSION['yourlikings'] = $yourlikings_array;
    endif;
?>    