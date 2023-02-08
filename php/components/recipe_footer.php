<?php 
    $current_page = $_SESSION['current_page'];
?>    
<div class="recipe-footer">
    <?php if (isset($_SESSION['food_data']) || $current_page == "others-recipe" || $current_page == "search-result") {
        if ($pageNum > 0) { ?>
            <a class="go-back" href="php/data/next-page.php?message=back&page=<?php echo $current_page?>">Go back</a>
        <?php };
        if ($data_count - ($pageNum * 12) > 12) { ?>
            <a class="go-to-next" href="php/data/next-page.php?message=go&page=<?php echo $current_page?>">Next Page</a>
        <?php }; 
    }; ?>
</div>