<?php
    // Start the session
    session_start();
    if (isset($_SESSION['user_id']) && isset($_SESSION['username']) && isset($_SESSION['profile-img'])):
        if (isset($_POST['link']) && isset($_POST["foodName"]) && isset($_POST["category"]) && isset($_POST["visibility"]) && is_uploaded_file($_FILES['food-file']['tmp_name'])):
            // Server connection
            include 'connection.php';
            // Get the user id, username, profile-img
            $user_id = $_SESSION['user_id'];
            $user_name = strtoupper($_SESSION['username']);
            $user_img = $_SESSION['profile-img'];
            // Get the user input
            $link = $_POST['link'];
            $foodName = strtoupper($_POST["foodName"]);
            $category = strtoupper($_POST["category"]);
            $visibility = $_POST["visibility"];
            /* Get the last id */
            $lastIDs = $sql->query("SELECT * from foods ORDER BY id DESC LIMIT 1");
            /* Decide the file name */
            $row  = mysqli_fetch_array($lastIDs);
            $lastID = $row['id'] + 1;
            $fileName = strval ($user_id)."-". strval ($lastID).".".str_replace("image/", "", $_FILES['food-file']['type']);
            // Insert into "foods" server
            $result = $sql->query(
                "INSERT INTO foods(uploaded_food_img, link, food_name, category, visibility, user_id, user_name, pro_img) 
                VALUES ('$fileName', '$link', '$foodName', '$category', '$visibility', '$user_id', '$user_name', '$user_img')"
            );
            /* File path to upload */
            $file_path = "../../assets/upload-img/";
            move_uploaded_file($_FILES['food-file']['tmp_name'], $file_path .$fileName);
            // Unset food data
            unset($_SESSION['food_data']);
            // Unset category data
            unset($_SESSION['category_data']);
            // Unset everyone data
            unset($_SESSION['everyoneData']);
            // Unset Your likings
            unset($_SESSION['yourlikings']);
            // Redirect
            header("Location: ../../my-recipe.php");
        endif;
    endif;
?>