<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "category";
    include 'php/components/upper.php';
    // Server Connection
    include 'php/data/connection.php';
    // Get Category Data
    include 'php/initial-setting/category.php';
    // Get Food Data
    include 'php/initial-setting/myRecipe-data.php';
    // Get the next page
    include 'php/initial-setting/initial.php';
?>
<main>
    <div class="recipe-tile">
        <div class="recipe-container">
            <div class="recipe-tile-titles category">
                <h2>Category</h2>
            </div>
            <?php if (isset($_SESSION['user_id']) && $_SESSION['category_data'] != 0 && $_SESSION['food_data'] != 0): ?>
                <div class="recipe-main">
                    <div class="recipe-contents">
                        <?php
                            // Assign the data to the variable
                            $data = $_SESSION['category_data'];
                            $food_data = $_SESSION['food_data'];
                            $pageNum = $_SESSION['categoryRecipe'];
                            $data_count = COUNT($data);
                            // Get the data_max
                            include 'php/components/data-max.php';
                            for ($i = $pageNum * 12; $i < $data_max; $i ++): ?>
                                <div class="myrecipe-tile">
                                    <div class="myrecipe-tile-title">
                                        <h4><?php echo $data[$i]['category'] ?></h4>
                                    </div>
                                    <a href="category-page.php?food_category=<?php echo $data[$i]['category']?>" class="othersRecipe-tile-pic">
                                        <img src="assets/upload-img/<?php 
                                            for ($j = 0; $j < count($food_data); $j ++):
                                                if ($data[$i]['category'] == $food_data[$j]['category']):
                                                    $pic =  $food_data[$j]['uploaded_food_img'];
                                                endif;
                                            endfor; 
                                            echo $pic; ?> 
                                        ">
                                    </a>
                                    <div class="recipe-tile-sub">
                                        <div class="category-number">
                                            <a href="category-page.php?food_category=<?php echo $data[$i]['category']?>">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </a>
                                            <p><?php echo $data[$i]['COUNT(category)'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endfor;
                        ?>
                    </div>
                    <?php include 'php/components/recipe_footer.php';?>   
                </div> 
            <?php elseif (isset($_SESSION['user_id'])):?>
                <div class="need-to-login an">
                    <p>No categories to show</p>
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