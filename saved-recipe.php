<?php
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "saved-recipe";
    include 'php/components/upper.php';
    // Server Connection
    include 'php/data/connection.php';
    // Get Saved Recipe
    include 'php/initial-setting/saved-recipe.php';
    include 'php/initial-setting/yoursaving.php';
    // Get the next page
    include 'php/initial-setting/initial.php';
?>
<main>
    <div class="recipe-tile">
        <div class="recipe-container">
            <div class="recipe-tile-titles saved-recipe">
                <h2>Saved Recipe</h2>
            </div>
            <?php if (isset($_SESSION['user_id']) && $_SESSION['savedRecipe_data'] != 0 && $_SESSION['savedEveryone_data'] != 0): ?>
                <div class="recipe-main">
                    <div class="recipe-contents">
                        <?php $data = $_SESSION['savedRecipe_data'];
                        $everyone_data = $_SESSION['savedEveryone_data'];
                        $data_count = count($data);
                        $pageNum = $_SESSION['savedRecipe'];
                        // Get the data_max
                        include 'php/components/data-max.php';
                        // Exchange data
                        $data = $everyone_data;
                        $saved_data = $_SESSION['savedRecipe_data'];
                        for ($j = $pageNum * 40; $j < $data_max; $j ++):
                            for ($i = 0; $i < count($data); $i ++):
                                if ($saved_data[$j]['food_id'] == $data[$i]['id']):?>
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
                                <?php endif; 
                            endfor;
                        endfor;?> 
                    </div>
                    <?php include 'php/components/recipe_footer.php'; ?>
                </div>
            <?php elseif (isset($_SESSION['user_id'])):?>
                <div class="need-to-login an">
                    <p>No Foods to show</p>
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