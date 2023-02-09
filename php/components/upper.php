<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta from Template -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <!-- Link from Template -->
        <link rel="shortcut icon" href="assets/img/profile.png" type="image/vnd.microsoft.icon">
        <link rel="icon" href="assets/img/profile.png" type="image/vnd.microsoft.icon">
        <link rel="apple-touch-icon" href="assets/img/profile.png">
        <link rel="apple-touch-icon-precomposed" href="assets/img/profile.png">
        <!-- Title of this website -->
        <title>Recipe Box</title>
        <!-- Load Files and links -->
        <!-- css -->
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/signup-login.css">
        <link rel="stylesheet" href="assets/css/recipe-tile.css">
        <link rel="stylesheet" href="assets/css/myrecipe-tile.css">
        <link rel="stylesheet" href="assets/css/recipe-tile-sub.css">
        <link rel="stylesheet" href="assets/css/recipe-footer.css">
        <link rel="stylesheet" href="assets/css/othersRecipe-tile.css">
        <link rel="stylesheet" href="assets/css/uploading-recipe.css">
        <link rel="stylesheet" href="assets/css/contact-us.css">
        <!-- font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Fredoka&family=Fredoka+One&family=Hind&family=Inter&family=Laila&family=League+Gothic&family=League+Script&family=League+Spartan:wght@300;500;600;700;800&family=Montserrat&family=Pontano+Sans&family=Poppins&family=Quicksand&family=Roboto&family=Share+Tech+Mono&display=swap" rel="stylesheet">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
    <body onload="injectNode('main', 'php/data/ajax.php')">  
        <div class="contents">
            <header>
                <div class="logos">
                   <a href="index.php" class="logo">
                        <img src="assets/img/profile-upper.png">
                    </a>
                    <a href="index.php" class="header-title">
                        <h1>RECIPE B<img src="assets/img/egg.png">X</h1>
                    </a>
                </div>
                <form class="searchbox" method="post" action="php/data/search.php">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" placeholder="Search... (Food Name)" onKeyPress="return checkSubmit(event)" name = "search_key_words">
                </form>
                <div class="header-buttons">
                    <a href="index.php"><i class="fa fa-home" aria-hidden="true"></i></a>
                    <a href="calendar.php"><i class="fa fa-calendar-o" aria-hidden="true"></i></a>
                    <a id="notifi-logo-btn"><i class="fa fa-bell" aria-hidden="true"></i></a>
                </div>
                <div class="profile-logo">
                    <img id="profile-logo-btn"
                        <?php if (isset($_SESSION['profile-img'])):
                            $profile_img = $_SESSION['profile-img']?>
                            src = "assets/upload-img/<?php echo $profile_img?>" 
                        <?php else: ?>
                            src="assets/img/user-avatar.png" style="width: 180%; padding-bottom: 28%;"
                        <?php endif; ?>
                    >
                </div>
            </header>
            <div class="container">
                <!-- Navigations -->
                <?php include 'nav.php';?>