<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
    <h1>Blog de Jean Forteroche!</h1>
    <p>Derniers billets du blog :</p>
<div ><a href="index.php?action=addPostDisplay" class="btn btn-xs btn-primary">Ajouter un article</a></div>
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
                        <a href="index.php?action=updatePostDisplay&amp;id=<?= $data['id'] ?>" class="btn btn-xs btn-primary">Modifier l'article</a>

                    </h3>

                    <p>
                        <a href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>" class="btn btn-info btn-lg">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </p>


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

<?php require('layout.php'); ?>