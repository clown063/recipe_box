<?php
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "contact-us"; 
    include 'php/components/upper.php';
?>
<main class="contact-us-main">
    <form class="saved-recipe-tile" method="post" action="php/data/messages.php">
        <div class="top">
            <h3>How can we help?</h3>
        </div>
        <div class="body">
            <div class="contact-title">
                <input type="text" placeholder="TOPIC" required name="topic">
            </div>
            <div class="contact-message">
                <textarea placeholder="Give us a message..." required name = "message"></textarea>
            </div>
        </div>
        <div class="user-submit">
            <input type="submit" class="user-btn contact" value="SEND">
        </div>
    </form>
    <?php if (isset($_SESSION['contact_message'])) { ?>
        <div class="contact-messages">
            <p>
                <?php $contact_message = $_SESSION['contact_message'];
                echo $contact_message; ?>
            </p>
        </div>
    <?php } ?>
</main>
<?php 
    include 'php/components/bottom.php';
?>