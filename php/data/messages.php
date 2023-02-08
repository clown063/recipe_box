<?php 
    // Start the session
    session_start();
    if (isset($_POST['topic']) && isset($_POST['message'])):
        // Server connection
        include 'connection.php';
        // Get the username
        if (isset($_SESSION['user_id'])):
            $user_name = $_SESSION['username'];
        else:
            $user_name = "Guest";
        endif;
        // Assign the send data to the variable
        $title = $_POST['topic'];
        $message = $_POST['message'];
        // Sava message to the server
        $message_send = $sql->query("INSERT INTO messages (user_name, title, messages) VALUES ('$user_name', '$title', '$message')");
        // Message sent message
        if ($message_send):
            $_SESSION['contact_message'] = "Message Sent Successfully";
        else:
            $_SESSION['contact_message'] = "Something Went Wrong";
        endif;
        header("Location: ../../contact-us.php");
    endif;
?>