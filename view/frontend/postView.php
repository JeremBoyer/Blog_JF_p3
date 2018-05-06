<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <h1>Blog de Jean Forteroche!</h1>
    <p><a href="index.php" class="btn btn-xs btn-primary">Retour à la liste des billets</a></p>

    <div class="row">
        <div class="container">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['created_at_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
        </div>
    </div>


    <div class="col-md-offset-2 col-md-8">
         <div class="container">

    <h2>Commentaires</h2>

    <?php
    while ($comment = $comments->fetch())
    {
        ?>
        <div class="row">
        <p><strong><?= htmlspecialchars($comment['username']) ?></strong> le <?= $comment['created_comment_at_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </div>
        <?php
    }
    ?>
             </div>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template/layout.php'); ?>
