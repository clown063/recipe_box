<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "my-recipe";
    include 'php/components/upper.php';
    // Server Connection
    include 'php/data/connection.php';  
    // Get Food Data
    include 'php/initial-setting/myRecipe-data.php';
    // Get the next page
    include 'php/initial-setting/initial.php';
?>
<main>
    <div class="recipe-tile">
        <div class="recipe-container">
            <div class="recipe-tile-titles">
                <h2>Recently Uploaded Recipe</h2>
            </div>
            <?php if (isset($_SESSION['user_id']) && $_SESSION['food_data'] != 0): ?>
                <div class="recipe-main">
                    <div class="recipe-contents">
                        <?php // Assign the data to the variable
                        $data = $_SESSION['food_data'];
                        $pageNum = $_SESSION['myrecipe'];
                        $data_count = COUNT($data);
                        // Get the data_max
                        include 'php/components/data-max.php';
                        for ($i = $pageNum * 12; $i < $data_max; $i ++):?>
                            <div class="myrecipe-tile">
                                <div class="myrecipe-tile-title">
                                    <h4><?php echo $data[$i]['food_name'] ?></h4>
                                </div>
                                <a href="<?php echo $data[$i]['link'] ?>" class="myrecipe-tile-pic" rel="noopener" target="_blank">
                                    <img src="assets/upload-img/<?php echo $data[$i]['uploaded_food_img'] ?>">
                                </a>
                                <?php include 'php/components/recipe-tile-sub.php'; ?>
                            </div>
                        <?php endfor;?>      
                    </div>
                    <?php include 'php/components/recipe_footer.php'; ?>
                </div>
            <?php elseif (isset($_SESSION['user_id'])):?>
                <div class="need-to-login an">
                    <p>No recipes to show</p>
                </div>
            <?php else: ?>
                <div class="need-to-login an">
                    <p>YOU NEED TO LOGIN</p>
                </div>
            <?php endif; ?>     
        </div>      
    </div>
</main>
<?php   
    include 'php/components/bottom.php';
?>