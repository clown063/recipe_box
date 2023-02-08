<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "others-recipe";
    include 'php/components/upper.php';
    // Server Connection
    include 'php/data/connection.php';
    // Get Others Food Data
    include 'php/initial-setting/others-recipe.php';
    // Get the next page
    include 'php/initial-setting/initial.php';
?>
<main>
    <div class="recipe-tile">
        <div class="recipe-container">
            <div class="recipe-tile-titles">
                <h2>Recently Uploaded Recipe</h2>
            </div>
            <?php if ($_SESSION['everyoneData'] != 0): ?>
                <div class="recipe-main">
                    <div class="recipe-contents">
                        <?php $data = $_SESSION['everyoneData'];
                        $pageNum = $_SESSION['othersRecipe'];
                        $data_count = COUNT ($data);
                        // Get the data_max
                        include 'php/components/data-max.php';
                        for ($i = $pageNum * 12; $i < $data_count; $i ++): ?>
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
                </div>
            <?php else:?>
                <div class="need-to-login an">
                    <p>No recipes to show</p>
                </div>
            <?php endif;?>
        </div>      
    </div>
</main>     
<?php   
    include 'php/components/bottom.php';
?>