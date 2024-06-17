<?php 
require_once __DIR__ . '/parts/header.php'
?>

<h1>Partiel B1 DW 2324 PHP S2</h1>
<?php if(isset($_GET['success'])) :?>
<div class="alert alert-success mt-2">
    <?php echo $_GET['success']; ?>
</div>
<?php endif; ?>
<?php 
require_once __DIR__ . '/parts/footer.php'
?>