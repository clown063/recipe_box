<?php 
    if (isset($_SESSION['user_id']) && !isset($_SESSION['yoursaving'])):
        $user_id = $_SESSION['user_id'];
        $yoursaving = $sql->query("SELECT * FROM saved WHERE user_id = $user_id");
        $yoursaving_array = array();
        while ($saving = $yoursaving->fetch_assoc()):
            $yoursaving_array[] = $saving;
        endwhile; 
        $_SESSION['yoursaving'] = $yoursaving_array;
    endif;
?>    