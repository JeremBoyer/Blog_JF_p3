<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Blog de Jean Forteroche!</h1>
    <p>Derniers billets du blog :</p>

<div class="container">
<div class="row">
<?php

while ($data = $posts->fetch())
{
    ?>

            <div class="col-md-4">

                    <h3>
                        <?= htmlspecialchars($data['title']) ?>
                        <em>le <?= $data['created_at_fr'] ?></em>

                    </h3>

                    <p>
                        <?= nl2br(htmlspecialchars(substr($data['content'], 0, 200))) ?>
                        <br />
                        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-xs btn-primary">Lire la suite...</a>

                    </p>


            </div>
    <?php
}

$posts->closeCursor();
?>
</div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template/layout.php'); ?>