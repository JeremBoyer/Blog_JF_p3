<?php $title = htmlspecialchars($post['title']); ?>

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
        <p><strong><?= htmlspecialchars($comment['username']) ?></strong> le <?= $comment['created_comment_at_fr'] ?>
            (<a href="index.php?action=updateCommentDisplay&amp;id=<?= $comment['id'] ?>" class="btn btn-xs btn-primary">modifier</a>)</p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
            <p>
                <a href="index.php?action=deleteSoftComment&amp;id=<?= $comment['id'] ?>" class="btn btn-info btn-lg">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </p>
        </div>

        <?php
    }
    ?>
                 <p>
                     <a href="index.php?action=addCommentDisplay&amp;id=<?= $post['id'] ?>" class="btn btn-xs btn-primary">Poster un nouveau commentaire...</a>
                 </p>
             </div>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>
