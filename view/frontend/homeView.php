<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Mon super blog !</h1>
    <p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
    ?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['created_at_fr'] ?></em>

        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />

        </p>
    </div>
    <?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template/default.php'); ?>