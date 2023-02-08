<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "search-result";
    include 'php/components/upper.php';
    // Server Connection
    include 'php/data/connection.php';
    // Get the next page
    include 'php/initial-setting/initial.php';
?>
<main>
    <?php if (isset($_SESSION['search_result_data']) && isset($_SESSION['search_key_word'])):?>
        <div class="recipe-tile">
            <div class="recipe-container">
                <div class="recipe-tile-titles">
                    <h2>Search Result 
                        (
                            <?php $search_key_word = $_SESSION['search_key_word']; 
                            echo $search_key_word; ?>
                        ) 
                    </h2>
                </div>
                <div class="recipe-main">
                    <div class="recipe-contents">
                        <?php $data = $_SESSION['search_result_data'];
                        $pageNum = $_SESSION['search_result'];
                        $data_count = COUNT($data);
                        // Get the data_max
                        include 'php/components/data-max.php';
                        for ($i = $pageNum * 12; $i < $data_max; $i ++): ?>
                            <div class="othersRecipe-tile">
                                <div class="othersRecipe-tile-title">
                                    <div class="others-pro-img">
                                        <img src="assets/upload-img/<?php echo $data[$i]['pro_img'] ?>">
                                    </div>
                                    <p><?php echo $data[$i]['user_name'] ?></p>
                                    <h4><?php echo $data[$i]['food_name'] ?></h4>
                                </div>
                                <a href="<?php echo $data[$i]['link'] ?>" class="othersRecipe-tile-pic" rel="noopener" target="_blank">
                                    <img src="assets/upload-img/<?php echo $data[$i]['uploaded_food_img'] ?>">
                                </a>
                                <?php include 'php/components/recipe-tile-sub.php'; ?>
                            </div>
                        <?php endfor;?>
                    </div>
                    <?php include 'php/components/recipe_footer.php'; ?>
                </div>
            </div>      
        </div>
    <?php endif;?>    
</main>
<?php 
    include 'php/components/bottom.php';
?>