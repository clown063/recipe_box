<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "upload-recipe";
    // Server Connection
    include 'php/data/connection.php';  
    include 'php/components/upper.php';
    // Get Category Data
    include 'php/initial-setting/category.php';
    // Get Food Data
    include 'php/initial-setting/myRecipe-data.php';
    if (isset($_SESSION['user_id'])):
        $data = $_SESSION['category_data'];
    endif;
?> 
<main>
    <div class="upload-recipe-tile">
        <div class="uploading-recipe">
            <div class="upload-recipe-tile-titles">
                <h2>Upload Recipe</h2>
            </div>
            <?php if (isset($_SESSION['user_id'])):?>
                <form class="upload-recipe-tile-contents" action="php/data/upload-food.php" method="post" enctype="multipart/form-data">
                    <div>
                        <div class="pic-link">
                            <div class="upload-pic" id="upload-pic"> 
                                <input type="file" title="" required accept="image/png, image/jpeg, image/jpg, image/webp" name="food-file" onchange="foodPreviewImage(event)">
                                <div class="upload-pic-div" id="upload-pic-div">
                                    <i class="fa fa-camera" aria-hidden="true"></i>
                                    <p id="upload-pic-div-p">ADD IMAGE(JPG, PNG or WebP)</p>
                                </div>    
                                <img id="food-preview-selected-image"> 
                            </div>
                            <input type="url" placeholder="Paste Recipe Link Here" name="link" required>
                        </div>
                        <div class="food-form">
                            <div class="food-input">
                                <i class="fas fa-hamburger"></i>
                                <input type="text" placeholder="Food Name" name="foodName">
                            </div>
                            <div class="food-input">
                                <i class="fa fa-list" aria-hidden="true"></i>
                                <input list="food-category" placeholder = "Category" name="category" required>
                                <datalist id="food-category">
                                    <?php if ($data != 0):
                                        for ($i = 0; $i < COUNT($data); $i ++):?>
                                            <option value = "<?php echo strtoupper($data[$i]['category']) ?>"></option>
                                        <?php endfor;
                                    else: ?>        
                                        <option value="JAPANESE"></option>
                                        <option value="WESTERN"></option>
                                        <option value="ITALIAN"></option>
                                        <option value="CHINESE"></option>
                                        <option value="FRENCH"></option>
                                        <option value="KOREAN"></option>
                                    <?php endif; ?>    
                                </datalist>
                            </div>
                            <div class="food-input">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <select id="pet-select" name="visibility" required>
                                    <option value="0">Public</option>
                                    <option value="1">Private</option>
                                </select>
                            </div>
                            <input type="submit" value="upload" class="food-submit-btn">
                        </div>
                    </div>    
                </form>
            <?php else: ?>
                <div class="need-to-login">
                    <p>YOU NEED TO LOGIN</p>
                </div>
            <?php endif; ?> 
        </div>
        <div class="uploading-recipe category">
            <div class="upload-recipe-tile-titles">
                <h2>Category</h2>
            </div>
            <?php if (isset($_SESSION['user_id'])):?>
                <div class="uploading-category-main">
                    <div class="uploading-category-contents">
                        <?php $food_data = $_SESSION['food_data'];
                        for ($i = 0; $i < COUNT($data); $i ++):?>
                            <div class="category-tile">
                                <div class="category-tile-title">
                                    <h4><?php echo $data[$i]['category'] ?></h4>
                                </div>
                                <a class="category-tile-pic" href="category-page.php?food_category=<?php echo $data[$i]['category']?>">
                                    <img src="assets/upload-img/<?php 
                                        for ($j = 0; $j < count($food_data); $j ++):
                                            if ($data[$i]['category'] == $food_data[$j]['category']):
                                                $pic =  $food_data[$j]['uploaded_food_img'];
                                            endif;
                                        endfor; echo $pic; ?> 
                                    ">
                                </a>
                                <div class="category-tile-sub">
                                    <div class="category-number">
                                        <a href="category-page.php?food_category=<?php echo $data[$i]['category']?>"><i class="fa fa-list" aria-hidden="true"></i></a>
                                        <p><?php echo $data[$i]['COUNT(category)'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endfor;?>
                    </div>
                </div>
            <?php else:?>
                <div class="need-to-login">
                    <p>YOU NEED TO LOGIN</p>
                </div>
            <?php endif; ?> 
        </div>   
    </div>
    <?php include 'php/components/menu-container.php';?>
</main>
<?php 
    include 'php/components/bottom.php';
?>