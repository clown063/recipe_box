<?php
session_start();
if (isset($_SESSION['user_id'])):
    unset($_SESSION["username"]);
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
    unset($_SESSION["profile-img"]);
    unset($_SESSION['user_id']);
    unset($_SESSION['food_data']);
    unset($_SESSION['category_data']);
    unset($_SESSION['everyoneData']);
    unset($_SESSION['myrecipe']);
    unset($_SESSION['yourlikings']);
    unset($_SESSION['saved_recipe']);
    unset($_SESSION['savedEveryoneData']);
    unset($_SESSION['yoursaving']);
    header("Location: ../../index.php");
endif;

?>