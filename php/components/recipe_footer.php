<?php 
    $current_page = $_SESSION['current_page'];
?>    
<div class="recipe-footer">
    <?php 
        for ($i = 1; $i < $page_count+2; $i ++):?>
            <a href="php/data/next-page.php?message=<?php echo $i?>&page=<?php echo $current_page?>"
                <?php if ($pageNum+1 == $i):?>
                    class="focus"
                <?php endif;?>
            ><?php echo $i?></a>
        <?php endfor;
    ?>
</div>