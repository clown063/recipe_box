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
<?php if ($data_max - $pageNum * 40 < 8):?>
    <script type="text/JavaScript">
        var recipe_footers = document.querySelectorAll('.recipe-footer');
        var recipe_mains = document.querySelectorAll('.recipe-main');
        recipe_footers.forEach(recipe_footer=> {
            recipe_footer.classList.add('focus');
        });
        recipe_mains.forEach(recipe_main=> {
            recipe_main.classList.add('focus');
        });
    </script>
<?php else:?>
    <script type="text/JavaScript">
        var recipe_footers = document.querySelectorAll('.recipe-footer');
        var recipe_mains = document.querySelectorAll('.recipe-main');
        recipe_footers.forEach(recipe_footer=> {
            recipe_footer.classList.remove('focus');
        });
        recipe_mains.forEach(recipe_main=> {
            recipe_main.classList.remove('focus');
        });
    </script>
<?php endif;?>