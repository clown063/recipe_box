<?php 
    $page_count = floor(count($data)/40);

    if ($data_count - ($pageNum * 40) <= 40) {
        $data_max = count ($data);
    } else {
        $data_max = $pageNum * 40 + 40;
    };
?>    