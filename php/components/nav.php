<?php 
    $current_page = $_SESSION['current_page'];
?>
<nav>    
    <a href="./index.php" class="down-logo">
        <img src="assets/img/profile-down.png">
    </a>
    <div class="navigations">
        <a class="my-recipe  
            <?php if ($current_page == "my-recipe") { ?>
                focus
            <?php }; ?>" href="my-recipe.php">
            <i class="fa fa-user" aria-hidden="true"></i>
            <p>My Recipe</p>
        </a>
        <a class="upload-recipe
            <?php if ($current_page == "upload-recipe") { ?>
                focus
            <?php }; ?>" href="upload-recipe.php">
            <i class="fa fa-upload" aria-hidden="true"></i>
            <p>Upload Recipe</p>
        </a>
        <a class="others-recipe 
            <?php if ($current_page == "others-recipe") { ?>
                focus
            <?php }; ?>" href="others-recipe.php">
            <i class="fa fa-users" aria-hidden="true"></i>
            <p>Others Recipe</p>
        </a>
        <a class="top-recipe-sites 
            <?php if ($current_page == "top-recipe") { ?>
                focus
            <?php }; ?>" href="top-recipe-sites.php">
            <i class="fa fa-trophy" aria-hidden="true"></i>
            <p>Top Recipe</p>
        </a>
        <a class="saved-recipe 
            <?php if ($current_page == "saved-recipe") { ?>
                focus
            <?php }; ?>" href="saved-recipe.php">
            <i class="fa fa-bookmark" aria-hidden="true"></i>
            <p>Saved Recipe</p>
        </a>
        <a class="contact-us
            <?php if ($current_page == "contact-us") { ?>
                focus
            <?php }; ?>" href="contact-us.php">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <p>Contact Us</p>
        </a>
    </div>
</nav>