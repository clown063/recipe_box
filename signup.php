<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "signup";
    include 'php/components/upper.php';
?>
<main>
    <form class="signup" action="php/data/user-signup.php" method="post" enctype="multipart/form-data">
        <div class="profile-pic">
            <div class="profile-pic-div" id="profile-pic-div"> 
                <div class="img-upload" id="img-upload">
                    <input type="file" title="" required accept="image/png, image/jpeg, image/jpg" name="file" onchange="previewImage(event)">
                    <div class="img-upload-div" id="img-upload-div">
                        <i class="fa fa-camera" aria-hidden="true"></i>
                        <p id="img-upload-div-p">ADD IMAGE(JPG or PNG)</p>
                    </div>    
                </div>
                <img id="preview-selected-image"> 
            </div>
        </div>
        <div class="profile-reg">
            <div class="input-div one 
                <?php if (isset($_SESSION['input-username'])) { ?>
                    focus
                <?php } ?>
            ">
                <div class="i">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div>
                    <h5>User Name</h5>
                    <input class="input one" type="text" name="username" required 
                        <?php if (isset($_SESSION['input-username'])) { 
                            $input_username = $_SESSION['input-username']; ?>
                            value=<?php echo $input_username ?>
                        <?php } ?>
                    >
                </div>
                <div class="username-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                </div>
            </div>
            <div class="input-div two 
                <?php if (isset($_SESSION['input-email'])) { ?>
                    focus
                <?php } ?>
            ">
                <div class="i">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
                <div>
                    <h5>Email</h5>
                    <input class="input two" type="email" name="email" required 
                        <?php if (isset($_SESSION['input-email'])) { 
                            $input_email = $_SESSION['input-email']; ?>
                            value=<?php echo $input_email ?>
                        <?php } ?>
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
                    <h5>Password</h5>
                    <input class="input three" type="password" name="password" required
                        <?php if (isset($_SESSION['input-password'])) { 
                            $input_password = $_SESSION['input-password']; ?>
                            value=<?php echo $input_password ?>
                        <?php } ?>
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
                    <input class="input four" type="password" name="password2" required
                        <?php if (isset($_SESSION['input-password'])) { 
                            $input_password = $_SESSION['input-password']; ?>
                            value=<?php echo $input_password ?>
                        <?php } ?>
                    >
                    <i class="fa fa-eye password_open focus" aria-hidden="true"></i>
                    <i class="fa fa-eye-slash password_closed" aria-hidden="true"></i>
                </div>
                <div class="password2-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                </div>
            </div>
            <div class="user-submit">
                <input type="submit" class="user-btn" value="signup">
            </div>
            <div class="errors">
                <?php 
                    if (isset($_SESSION['email-error'])) {
                        $email_error = $_SESSION['email-error'];
                        echo "<div class='signup-error'>$email_error</div>"; 
                    } 
                    if (isset($_SESSION['password-error'])) {
                        $password_error = $_SESSION['password-error'];
                        echo "<div class='signup-error'>$password_error</div>"; 
                    }
                    if (isset($_SESSION['server-error'])) {
                        $server_error = $_SESSION['server-error'];
                        echo "<div class='signup-error'>$server_error</div>"; 
                    } 
                ?>
            </div>    
        </div>
    </form>
</main>
<?php
    include 'php/components/bottom.php';
    // Error Message
    unset($_SESSION["email-error"]);
    unset($_SESSION["password-error"]);
    unset($_SESSION['server-error']);
    // Save the input detail when error occurs
    unset($_SESSION["input-username"]);
    unset($_SESSION["input-email"]);
    unset($_SESSION["input-password"]);
?>