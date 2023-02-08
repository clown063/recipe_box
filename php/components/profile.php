<?php 
    $current_page = $_SESSION['current_page'];
?>
<div class="profile" id="profile">
    <div class="name-pic">
        <div class="pro-pic">
            <img 
                <?php if (isset($_SESSION['profile-img'])) { 
                    $profile_img = $_SESSION['profile-img']?>
                    src = "assets/upload-img/<?php echo $profile_img?>" 
                <?php } else { ?>
                    src="assets/img/user-avatar.png" style="width: 180%; padding-bottom: 28%;"
                <?php } ?>
            >
        </div>
        <div>
            <p>
                <?php if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo $username;
                } else { ?>
                    Guests
                <?php } ?>
            </p>    
        </div>
    </div>
    <div class="profile-nav">
        <?php if (isset($_SESSION['username'])) { ?>
            <a href="edit.php" class="edit-btn proNav
                <?php if ($current_page == "edit") { ?>
                    focus
                <?php }; ?>
            ">
                <div>
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </div>    
                <p>Edit</p>
            </a>
            <a href="php/data/logout.php" class="logout-btn">
                <div>
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                </div>
                <p>Log out</p>
            </a>
        <?php } else { ?>
            <a href="signup.php" class="signup-btn proNav
            <?php if ($current_page == "signup") { ?>
                    focus
                <?php }; ?>
            ">
                <div>
                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                </div>    
                <p>Signup</p>
            </a>
            <a href="login.php" class="login-btn proNav
                <?php if ($current_page == "login") { ?>
                    focus
                <?php }; ?>
            ">
                <div>
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                </div>
                <p>Login</p>
            </a>
        <?php } ?>
    </div>
</div>