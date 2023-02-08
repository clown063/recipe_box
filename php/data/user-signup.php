<?php
    // Start the session
    session_start();
    // Server connection
    include 'connection.php';
    if (isset($_POST['username']) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"]) && is_uploaded_file($_FILES['file']['tmp_name'])):
        // Get the input data from signup.php
        $username = $_POST['username'];
        $email = $_POST["email"];
        $password = crypt($_POST["password"], '$5$rounds=5000$usesomesillystringforsalt$');
        $password2 = crypt($_POST["password2"], '$5$rounds=5000$usesomesillystringforsalt$');
        // Email address duplicate check
        $duplicate = $sql->query(
            "SELECT * FROM users WHERE email = '$email'"
        );
        /* Get the last id (For the file name) */
        $lastIDs = $sql->query("SELECT * from users ORDER BY id DESC LIMIT 1");
        // Check if the 2 input password are same
        if ($password == $password2):
            /* The mysqli_num_rows() function returns the number of rows in a result set */
            if (mysqli_num_rows($duplicate) > 0):
                $_SESSION['email-error']= "Email address already exists"; 
                $_SESSION['input-username'] = $username;
                $_SESSION['input-password'] = $_POST["password"];
                header("Location: ../../signup.php");
            else:
                /* Decide the file name */
                $row  = mysqli_fetch_array($lastIDs);
                $lastID = $row['id'] + 1;
                $fileName = strval ($lastID).".".str_replace("image/", "", $_FILES['file']['type']);
                // Insert data to the server
                $result = $sql->query(
                    "INSERT INTO users(username, email, password, profile_img) 
                    VALUES ('$username', '$email', '$password', '$fileName')"
                );
                if ($result):
                    /* File path to upload */
                    $file_path = "../upload-img/";
                    // Upload file
                    move_uploaded_file($_FILES['file']['tmp_name'], $file_path .$fileName);
                    // Assign Session
                    $_SESSION['username'] =  $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['profile-img'] = $fileName;
                    $_SESSION['user_id'] = $lastID;
                    header('Location: ../../index.php');
                else:
                    $_SESSION['server-error'] = "Failed to connect to the server";
                    $_SESSION['input-username'] = $username;
                    $_SESSION['input-email'] = $email;
                    $_SESSION['input-password'] = $_POST["password"];
                    header('Location: ../../signup.php');
                endif;
            endif;        
        else:
            $_SESSION['password-error']= "Type the same password"; 
            $_SESSION['input-username'] = $username;
            $_SESSION['input-email'] = $email;
            header("Location: ../../signup.php");
        endif;
    endif;    
?>