<?php 
    if ($data_count - ($pageNum * 12) <= 12) {
        $data_max = count ($data);
    } else {
        $data_max = $pageNum * 12 + 12;
    };
?>    