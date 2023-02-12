<?php
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "top-recipe";
    // Server Connection
    include 'php/data/connection.php';
    include 'php/components/upper.php';
    // Get Others Food Data
    include 'php/initial-setting/others-recipe.php';
    // Get Top Recipe
    include 'php/initial-setting/top-recipe.php';
?>
<main>
    <div class="recipe-tile">
        <div class="recipe-container">
            <div class="recipe-tile-titles top_recipe">
                <h2>Top Recipe</h2>
            </div>
            <?php if ($_SESSION['top_recipe'] != 0 && $_SESSION['everyoneData'] != 0):?>
                <div class="recipe-main">
                    <div class="recipe-contents">
                        <?php $data = $_SESSION['everyoneData'];
                        $top_recipe = $_SESSION['top_recipe'];
                        for ($j = 0; $j < count($top_recipe); $j ++):
                            for ($i = 0; $i < count($data); $i ++):
                                if ($top_recipe[$j]['food_id'] == $data[$i]['id']):?>
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
                    <div style="height: 10vh;">
                    </div>
                </div>
            <?php else:?>
                <div class="need-to-login an">
                    <p>No recipes to show</p>
                </div>
            <?php endif;?>
        </div>      
    </div>
    <?php include 'php/components/menu-container.php';?>
</main>
<?php 
    include 'php/components/bottom.php';
?>