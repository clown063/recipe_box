<?php 
    // Connect to Database
    $sql = mysqli_connect("127.0.0.1","root","Naoya19288264!","school", "3306");
    if (!$sql) {
        echo "Connection Error: ".mysqli_connect_error();
    }
?>    