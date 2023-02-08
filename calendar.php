<?php 
    session_start();
    // Show the current Page
    $_SESSION['current_page'] = "calendar";
    include 'php/components/upper.php'; 
?>
<main>
    <div class="saved-recipe-tile">
        <p>Coming Soon!!</p>
    </div>
</main>
<?php include 'php/components/bottom.php'; ?>