<?php
$title = 'Blog de Jean Forteroche';
?>

<?php ob_start(); ?>

<div class="container-fluid m-5 p-4">
    <div class="container">
    <div class="alert alert-danger" role="alert">
        <div class="p-4 display-2 text-center">
            <?= $error?>
        </div>
        <div class="p-4 display-4 text-center">
            <strong>Veuillez nous excuser pour la gêne occasionnée. Revenez à la <a href="index.php">page d'accueil.</a></strong>
        </div>
    </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>