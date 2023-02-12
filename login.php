<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "login";
    include 'php/components/upper.php';
?>
<main>
    <div class="login">
        <div class="login-profile-pic">
            <img src="assets/img/user-avatar.png">
        </div>
        <form class="profile-reg" action="php/data/user-login.php" method="post">
            <div class="input-div two">
                <div class="i">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
                <div>
                    <h5>Email</h5>
                    <input class="input login-one" type="email" name="email" required>
                </div>
                <div class="email-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                </div>
            </div>
            <div class="input-div three">
                <div class="i">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </div>
                <div>
                    <h5>Password</h5>
                    <input class="input login-two" type="password" name="password" required>
                    <i class="fa fa-eye password_open focus" id="hello" aria-hidden="true"></i>
                    <i class="fa fa-eye-slash password_closed" aria-hidden="true"></i>
                </div>
                <div class="password-success">
                    <i class="fa fa-check" aria-hidden="true"></i>
                </div>
            </div>
            <div class="user-submit">
                <input type="submit" class="user-btn" value="login">
            </div>
            <div class="errors">
                <?php 
                    if (isset($_SESSION['login-error'])) {
                        $login_error = $_SESSION['login-error'];
                        echo "<div class='login-error'>$login_error</div>"; 
                    } 
                ?>
            </div>   
        </form>
    </div>
    <?php include 'php/components/menu-container.php';?>
</main>
<?php 
    include 'php/components/bottom.php';
    unset($_SESSION["login-error"]);
?>