<?php 
    // Start the session
    session_start();
    if (isset($_POST["email"]) && $_POST["password"]):
        // Server connection
        include 'connection.php';
        // Get the input data from login.php
        $email = $_POST["email"];
        $password = crypt($_POST["password"], '$5$rounds=5000$usesomesillystringforsalt$');
        // Check if user has an account
        $loginCheck = $sql->query(
            "SELECT * FROM users WHERE email = '$email'"
        );
        $row  = mysqli_fetch_array($loginCheck);
        if (isset($row)):
            // Get the registered password
            $passwordReg = $row['password'];
            // Check if the password matches
            if ($passwordReg == $password):
                // Assign to the session
                $_SESSION['username'] =  $row['username'];
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $_SESSION["profile-img"] =  $row['profile_img'];
                $user_id = $row['id'];
                // Unset
                unset($_SESSION['food_data']);
                unset($_SESSION['category_data']);
                unset($_SESSION['yourlikings']);
                unset($_SESSION['yoursaving']);
                // Go to the index.php
                header("Location: ../../index.php");
            else:
                $_SESSION['login-error'] = "Password or email is incorrect";
                header("Location: ../../login.php");
            endif;
        else:
            $_SESSION['login-error'] = "Password or email is incorrect";
            header("Location: ../../login.php");
        endif;
    endif;
?>