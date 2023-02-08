<?php 
    $current_page = $_SESSION['current_page'];
?>                
            </div>
        </div>
        <?php include 'profile.php'; ?>
        <div class="notifi" id="notifi">
            <p>NONE</p>
        </div>
        <!-- AJAX -->
        <script src="assets/js/ajax.js"></script>
        <script src="assets/js/jQuery.js"></script>
        <script src="assets/js/style.js"></script>
        <script>
            <?php if ($current_page == "others-recipe" || $current_page == "top-recipe" || $current_page == "index" || $current_page == "saved-recipe" || $current_page == "my-recipe" || $current_page == "category-page"):?>
                setInterval(reloading, 300000);
            <?php else:?>
                clearInterval(reloading);
            <?php endif;?>
        </script>
    </body>
</html>