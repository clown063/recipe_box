<div class="menu-container">
    <div class="navigations iphone">
        <form class="searchbox" method="post" action="php/data/search.php">
            <div>
                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="text" placeholder="Search... (Food Name)" onKeyPress="return checkSubmit(event)" name = "search_key_words">
            </div>
        </form>
        <a class="home
            <?php if ($current_page == "index"): ?>
                focus
            <?php endif; ?>" href="index.php">
            <i class="fa fa-home" aria-hidden="true"></i>
            <p>Home</p>
        </a>
        <a class="calender 
            <?php if ($current_page == "calendar"): ?>
                focus
            <?php endif; ?>" href="calendar.php">
            <i class="fa fa-calendar-o" aria-hidden="true"></i>
            <p>calendar</p>
        </a>
        <a class="my-recipe  
            <?php if ($current_page == "my-recipe"): ?>
                focus
            <?php endif; ?>" href="my-recipe.php">
            <i class="fa fa-user" aria-hidden="true"></i>
            <p>My Recipe</p>
        </a>
        <a class="upload-recipe
            <?php if ($current_page == "upload-recipe"):?>
                focus
            <?php endif; ?>" href="upload-recipe.php">
            <i class="fa fa-upload" aria-hidden="true"></i>
            <p>Upload Recipe</p>
        </a>
        <a class="others-recipe 
            <?php if ($current_page == "others-recipe"): ?>
                focus
            <?php endif; ?>" href="others-recipe.php">
            <i class="fa fa-users" aria-hidden="true"></i>
            <p>Others Recipe</p>
        </a>
        <a class="top-recipe-sites 
            <?php if ($current_page == "top-recipe"): ?>
                focus
            <?php endif; ?>" href="top-recipe-sites.php">
            <i class="fa fa-trophy" aria-hidden="true"></i>
            <p>Top Recipe</p>
        </a>
        <a class="saved-recipe 
            <?php if ($current_page == "saved-recipe") : ?>
                focus
             <?php endif; ?>" href="saved-recipe.php">
            <i class="fa fa-bookmark" aria-hidden="true"></i>
            <p>Saved Recipe</p>
        </a>
        <a class="contact-us
            <?php if ($current_page == "contact-us"):?>
                focus
            <?php endif; ?>" href="contact-us.php">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <p>Contact Us</p>
        </a>
    </div>
    <div class="navigations tablet">
        <a class="my-recipe  
            <?php if ($current_page == "my-recipe"): ?>
                focus
            <?php endif; ?>" href="my-recipe.php">
            <i class="fa fa-user" aria-hidden="true"></i>
            <p>My Recipe</p>
        </a>
        <a class="upload-recipe
            <?php if ($current_page == "upload-recipe"):?>
                focus
            <?php endif; ?>" href="upload-recipe.php">
            <i class="fa fa-upload" aria-hidden="true"></i>
            <p>Upload Recipe</p>
        </a>
        <a class="others-recipe 
            <?php if ($current_page == "others-recipe"): ?>
                focus
            <?php endif; ?>" href="others-recipe.php">
            <i class="fa fa-users" aria-hidden="true"></i>
            <p>Others Recipe</p>
        </a>
        <a class="top-recipe-sites 
            <?php if ($current_page == "top-recipe"): ?>
                focus
            <?php endif; ?>" href="top-recipe-sites.php">
            <i class="fa fa-trophy" aria-hidden="true"></i>
            <p>Top Recipe</p>
        </a>
        <a class="saved-recipe 
            <?php if ($current_page == "saved-recipe") : ?>
                focus
             <?php endif; ?>" href="saved-recipe.php">
            <i class="fa fa-bookmark" aria-hidden="true"></i>
            <p>Saved Recipe</p>
        </a>
        <a class="contact-us
            <?php if ($current_page == "contact-us"):?>
                focus
            <?php endif; ?>" href="contact-us.php">
            <i class="fa fa-phone" aria-hidden="true"></i>
            <p>Contact Us</p>
        </a>
    </div>
</div>