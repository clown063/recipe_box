<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "index";
    include 'php/components/upper.php';
    // Server Connection
    include 'php/data/connection.php';
    // Get Others Food Data
    include 'php/initial-setting/others-recipe.php';
    // Get Food Data
    include 'php/initial-setting/myRecipe-data.php';
?>
<main>
    <div class="upload-recipe-tile">
        <div class="uploading-recipe">
            <div class="upload-recipe-tile-titles index">
                <h2>My Recipe</h2>
            </div>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="uploading-category-main">
                    <div class="uploading-category-contents">
                        <?php
                        if ($_SESSION['food_data'] != 0):
                            $data = $_SESSION['food_data'];
                            // Get the data_max
                            if (count($data) < 4):
                                $data_max = count($data);
                            else:
                                $data_max = 4;
                            endif;
                            for ($i = 0; $i < $data_max; $i ++):?>
                                <div class="myrecipe-tile">
                                    <div class="myrecipe-tile-title">
                                        <h4><?php echo $data[$i]['food_name'] ?></h4>
                                    </div>
                                    <a href="<?php echo $data[$i]['link'] ?>" class="myrecipe-tile-pic" rel="noopener" target="_blank">
                                        <img src="assets/upload-img/<?php echo $data[$i]['uploaded_food_img'] ?>">
                                    </a>
                                    <?php include 'php/components/recipe-tile-sub.php'; ?>
                                </div>
                            <?php endfor;
                        else: ?>
                            <div class="need-to-login">
                                <p>No recipes to show</p>
                            </div>
                        <?php endif; ?>           
                    </div>
                </div>
            <?php else: ?>
                <div class="need-to-login">
                    <p>YOU NEED TO LOGIN</p>
                </div>
            <?php endif;?> 
        </div>    
        <div class="uploading-category">
            <div class="uploading-category-titles index">
                <h2>Others Recipe</h2>
            </div>
            <?php if ($_SESSION['everyoneData'] != 0):?>
                <div class="uploading-category-main">
                    <div class="uploading-category-contents">
                        <?php
                            $data = $_SESSION['everyoneData'];
                            if (COUNT($data) < 4):
                                $data_max = count($data);
                            else:
                                $data_max = 4;
                            endif;
                            for ($i = 0; $i < $data_max; $i ++):?>
                                <div class="othersRecipe-tile">
                                    <div class="othersRecipe-tile-title">
                                        <div class="others-pro-img">
                                            <img src="assets/upload-img/<?php echo $data[$i]['pro_img'] ?>">
                                        </div>
                                        <p><?php echo $data[$i]['user_name'] ?></p>
                                        <h4><?php echo $data[$i]['food_name'] ?></h4>
                                    </div>
                                    <a href="<?php echo $data[$i]['link'] ?>" class="othersRecipe-tile-pic">
                                        <img src="assets/upload-img/<?php echo $data[$i]['uploaded_food_img'] ?>">
                                    </a>
                                    <?php include 'php/components/recipe-tile-sub.php'; ?>    
                                </div>
                            <?php endfor;
                        ?>   
                    </div>         
                </div>
            <?php else:?>
                <div class="need-to-login">
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