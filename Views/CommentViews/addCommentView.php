<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
    <h1>Mon super blog !</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['created_at_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
        </p>
    </div>

    <div class="col-md-offset-2 col-md-8">
        <div class="container">

            <h2>Commentaires</h2>

            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div>
                    <label for="user_id_fk">Auteur</label><br />
                    <input type="text" id="user_id_fk" name="user_id_fk" />
                </div>
                <div>
                    <label for="comment">Commentaire</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>

<?php
while ($comment = $comments->fetch())
{
    ?>
    <p><strong><?= htmlspecialchars($comment['username']) ?></strong> le <?= $comment['created_comment_at_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
}
?>
        </div>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>