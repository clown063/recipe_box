<?php
    // Start the Session
    session_start();
    // Server connection
    include 'connection.php';
    // Check if the user has the valie user_id
    if (isset($_SESSION['user_id'])):
        // Check if it was redirected from edit.php
        if (isset($_POST['username']) && isset($_POST["email"])):
            // Assign to the variable
            $username = $_POST['username'];
            $email = $_POST["email"];
            // Get the original email address
            $originalEmail = $_SESSION['email'];
            // Duplicate Check
            $duplicates = $sql->query(
                "SELECT * FROM users WHERE email = '$email'"
            );
            if ($email  == $originalEmail ):
                $emailCheck = true;
            else:
                $emailCheck = false;
            endif;
            // Check if the password was changed
            if (isset($_POST["password"]) && isset($_POST["password2"])):
                // Assign to the variable
                $password = crypt($_POST["password"], '$5$rounds=5000$usesomesillystringforsalt$');
                $password2 = crypt($_POST["password2"], '$5$rounds=5000$usesomesillystringforsalt$');
                // If the input password was same
                if ($password == $password2):
                    $passwordCheck = true;
                else:
                    $passwordCheck = false;
                endif;
            else:
                // Assign the original password
                $password = $_SESSION['password'];
                $passwordCheck = true;
            endif;
            if ($passwordCheck):
                if (mysqli_num_rows($duplicates) > 0 &&  !$emailCheck):
                    $_SESSION['email-error']= "Email address already exists"; 
                    $_SESSION["input-password"] = $_POST["password"];
                    $_SESSION["input-username"] = $_POST["username"];
                    header("Location: ../../edit.php");
                else:
                    // Get the id
                    $id = $_SESSION['user_id'];
                    // Check if new image was uploaded
                    $fileCheck = is_uploaded_file($_FILES['file']['tmp_name']);
                    if ($fileCheck):
                        $fileName = strval ($id).".".str_replace("image/", "", $_FILES['file']['type']);
                        /* File path to upload */
                        $file_path = "../upload-img/";
                        move_uploaded_file($_FILES['file']['tmp_name'], $file_path .$fileName);
                    else:
                        $fileName = $_SESSION['profile-img'];
                    endif;
                    // Insert into the database
                    $result = $sql->query(
                        "UPDATE users SET username = '$username', email = '$email', password = '$password', profile_img = '$fileName' WHERE id=$id"
                    );
                    // Assign to the Session
                    $_SESSION['username'] =  $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['profile-img'] = $fileName;
                    // Go to index.html
                    header("Location: ../../index.php");
                endif;
            else:
                $_SESSION['password-error']= "Type the same password";
                $_SESSION["input-username"] = $_POST["username"];
                $_SESSION["input-email"] = $_POST["email"];
                header("Location: ../../edit.php");
            endif;
        endif;
    endif;    
?>