<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "edit";
    include 'php/components/upper.php';
?>
<main>
    <?php if (isset($_SESSION['user_id'])):?>
        <form class="signup" action="php/data/user-update.php" method="post" enctype="multipart/form-data">
            <div class="profile-pic">
                <div class="profile-pic-div" id="profile-pic-div"> 
                    <div class="img-upload" id="img-upload">
                        <input type="file" title="" accept="image/png, image/jpeg, image/jpg" name="file" onchange="previewImage(event)">   
                    </div>
                    <img id="preview-selected-image" 
                        <?php if (isset($_SESSION['profile-img'])) { ?>
                            src = "assets/upload-img/<?php echo $profile_img?>" 
                        <?php } ?>
                    >
                </div>
            </div>
            <div class="profile-reg">
                <div class="input-div one focus">
                    <div class="i">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5>User Name</h5>
                        <input class="input one" type="text" name="username" required maxlength = "8"
                            <?php if (isset($_SESSION["input-username"])):
                                $username = $_SESSION['input-username']; ?>
                                value = "<?php echo $username?>"
                            <?php elseif (isset($_SESSION['username'])):
                                $username = $_SESSION['username']; ?>
                                value = "<?php echo $username?>"
                            <?php endif; ?>
                        >
                    </div>
                    <div class="username-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="input-div two focus">
                    <div class="i">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5>Email</h5>
                        <input class="input two" type="email" name="email" required
                            <?php if (isset($_SESSION["input-email"])):
                                $email = $_SESSION["input-email"]; ?>
                                value = <?php echo $email?>
                            <?php elseif(isset($_SESSION['email'])):
                                $email = $_SESSION['email']; ?>
                                value = "<?php echo $email?>"
                            <?php endif;?>
                        >
                    </div>
                    <div class="email-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="input-div three 
                <?php if (isset($_SESSION['input-password'])) { ?>
                    focus
                <?php } ?>
                ">
                    <div class="i">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5>New Password</h5>
                        <input class="input three" type="password" name="password"
                            <?php if (isset($_SESSION["input-password"])):
                                $input_password = $_SESSION["input-password"]; ?>
                                value="<?php echo $input_password ?>"
                            <?php endif; ?>
                        >
                        <i class="fa fa-eye password_open focus" aria-hidden="true"></i>
                        <i class="fa fa-eye-slash password_closed" aria-hidden="true"></i>
                    </div>
                    <div class="password-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="input-div four
                <?php if (isset($_SESSION['input-password'])) { ?>
                    focus
                <?php } ?>
                ">
                    <div class="i">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <div>
                        <h5>Confirm Password</h5>
                        <input class="input four" type="password" name="password2"
                            <?php if (isset($_SESSION["input-password"])):
                                $password = $_SESSION["input-password"]; ?>
                                value="<?php echo $password ?>"
                            <?php endif; ?>
                        >
                        <i class="fa fa-eye password_open focus" aria-hidden="true"></i>
                        <i class="fa fa-eye-slash password_closed" aria-hidden="true"></i>
                    </div>
                    <div class="password2-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="user-submit">
                    <input type="submit" class="user-btn" value="UPDATE">
                </div>
                <div class="errors">
                    <?php 
                        if (isset($_SESSION['email-error'])):
                            $email_error = $_SESSION['email-error'];
                            echo "<div class='signup-error'>$email_error</div>"; 
                        endif;
                        if (isset($_SESSION['password-error'])):
                            $password_error = $_SESSION['password-error'];
                            echo "<div class='signup-error'>$password_error</div>"; 
                        endif;
                    ?>
                </div>    
            </div>
        </form>
    <?php endif;?>
</main>
<?php
    include 'php/components/bottom.php';
    // Unset the error message
    unset($_SESSION["email-error"]);
    unset($_SESSION["password-error"]);
    // Unset the user input
    unset($_SESSION["input-username"]);
    unset($_SESSION["input-email"]);
    unset($_SESSION["input-password"]);
?>