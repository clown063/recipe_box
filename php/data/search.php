<?php
    session_start();
    if (isset($_POST['search_key_words'])):
        // Server connection
        include 'connection.php';
        // Get the serch key words from the user input
        $search_key_words = $_POST['search_key_words'];
        // Used https://stackoverflow.com/questions/3725878/php-mysql-search-case-sensitive as reference
        $search_word_fix = strtolower(str_replace(" ","%",$search_key_words));
        $search_result = $sql->query("SELECT * FROM foods WHERE lower(food_name) LIKE '%$search_word_fix%' AND visibility = 0");
        $search_result_array = array();
        while ($search = $search_result->fetch_assoc()):
            $search_result_array[] = $search;
        endwhile;
        if (isset($_SESSION['user_id'])):
            $user_id = $_SESSION['user_id'];
            $my_search_result = $sql->query("SELECT * FROM foods WHERE lower(food_name) LIKE '%$search_word_fix%' AND visibility = 1 AND user_id = $user_id");
            while ($my_search = $my_search_result->fetch_assoc()):
                array_push($search_result_array, $my_search);
            endwhile;
        endif;
        $_SESSION['search_result_data'] = $search_result_array;
        $_SESSION['search_key_word'] = $search_key_words;
        $_SESSION['search_result'] = 0;
        header("Location: ../../search-result.php");
    endif;
?>