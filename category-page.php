<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "category-page";
    // Server Connection
    include 'php/data/connection.php';
    include 'php/components/upper.php';

    if (isset($_GET['food_category']) && isset($_SESSION['user_id'])):
        // Get the user ID
        $user_id = $_SESSION['user_id'];
        // Get the selected food category
        $food_category = $_GET['food_category'];
        // Get the food data by the user and the selected category
        $category_page_data = $sql->query ("SELECT * FROM foods WHERE user_id = $user_id AND category = '$food_category' ORDER BY id DESC");
        $category_page_array = array();
        while ($category = $category_page_data->fetch_assoc()) :
            $category_page_array[] = $category;
        endwhile;
        // Needed when redirecting back from the like and saved 
        $_SESSION['category_page_data'] = $category_page_array;
    endif;
    // Get the next page
    include 'php/initial-setting/initial.php';
?>
<main>
    <?php if (isset($_SESSION['user_id'])): ?>
        <div class="recipe-tile">
            <div class="recipe-container">
                <div class="recipe-tile-titles">
                    <h2><?php echo $_SESSION['category_page_data'][0]['category']?></h2>
                </div>
                <div class="recipe-main">
                    <div class="recipe-contents">
                        <?php 
                            // Assign the data to the variable
                            $data = $_SESSION['category_page_data'];
                            $pageNum = $_SESSION['categoryPage'];
                            $data_count = COUNT($data);
                            // Get the data_max
                            include 'php/components/data-max.php';
                            for ($i = $pageNum * 12; $i < $data_max; $i ++): ?>
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
                        ?>
                    </div>
                    <?php include 'php/components/recipe_footer.php'; ?>      
                </div>
            </div>
        </div> 
    <?php endif; ?>   
</main>
<?php 
    include 'php/components/bottom.php';
?>