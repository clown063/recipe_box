<?php 
    $current_page = $_SESSION['current_page'];
    // Get the number of likes
    include 'php/initial-setting/number-of-likes.php';
    // Get your likings
    include 'php/initial-setting/yourlikings.php';
    // Get page numbers
    include 'php/initial-setting/initial.php';
    // Get your saving
    include 'php/initial-setting/yoursaving.php';
?>  
<div class="recipe-tile-sub">
    <div class="recipe-tile-sub-heart">
        <?php if (isset($_SESSION['user_id'])):
            $food_id = $data[$i]['id']; ?>
            <a href="php/data/likes.php?food_id=<?php echo $food_id ?>&page=<?php echo $current_page ?>">
                <i class="fa fa-heart" aria-hidden="true" class="recipe-i"<?php 
                    if (isset($_SESSION['yourlikings'])) {
                        $yourliking = $_SESSION['yourlikings'];
                        for ($your = 0; $your < count($yourliking); $your ++) {
                            if ($yourliking[$your]['food_id'] == $data[$i]['id']) { ?>
                                style="color: #FFA101;"
                            <?php }
                        }
                    } 
                ?>></i>
            </a>
        <?php else: ?>
            <i class="fa fa-heart" aria-hidden="true"></i>
        <?php endif; ?>    
        <p>
            <?php 
                for ($n = 0; $n < count($numberOfLikes_data); $n ++):
                    if ($numberOfLikes_data[$n]['food_id'] == $data[$i]['id']):
                        echo $numberOfLikes_data[$n]['COUNT(user_id)'];
                    endif;
                endfor;
            ?>
        </p>
    </div>
    <div>
        <?php if (isset($_SESSION['user_id'])): ?> 
            <a href="php/data/saved.php?food_id=<?php echo $food_id ?>&page=<?php echo $current_page ?>">
                <i class="fa fa-bookmark" aria-hidden="true"
                    <?php 
                        if (isset($_SESSION['yoursaving'])):
                            $yoursaving = $_SESSION['yoursaving'];
                            for ($saving = 0; $saving < count($yoursaving); $saving ++):
                                if ($yoursaving[$saving]['food_id'] == $data[$i]['id']): ?>
                                    style="color: #FFA101;"
                                <?php endif;
                            endfor;
                        endif;
                    ?>
                ></i>
            </a>
        <?php else: ?>
            <i class="fa fa-bookmark" aria-hidden="true"></i>
        <?php endif; ?>    
    </div>        
</div>