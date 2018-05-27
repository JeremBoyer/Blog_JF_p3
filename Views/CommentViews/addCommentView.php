<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
    <h1>Mon super blog !</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>

    <div class="row">
        <div class="container card">
            <div class="card-header">
                <h3>
                    <?= htmlspecialchars($post['title']) ?>
                </h3>
                <div class="text-muted">
                    <em>le <?= $post['created_at_fr'] ?></em>
                </div>
            </div>

            <div class="card-body">
                <p>
                    <?= ($post['content']) ?>
                </p>
            </div>
        </div>
    </div>
<div class="container-fluid">
        <div class="container">
            <?php
            if(isset($_SESSION['error']) || isset($_SESSION['success'])) {
                $alertType = 'success';
                $message = $_SESSION['success'];
                //$alertType = isset($_SESSION['error']) ? 'danger' : null;
                if(isset($_SESSION['error'])){
                    $alertType = 'danger';
                    $message = $_SESSION['error'];
                }
                session_destroy();
                ?>

                <div class="alert alert-<?= $alertType?>" role="alert">
                    <?= $message ?>
                </div>
                <?php
            }
            ?>
            <h2>Commentaires</h2>

            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <div class="form-group">
                    <label for="user_id_fk">Auteur</label><br />
                    <input class="form-control" type="text" id="user_id_fk" name="user_id_fk" placeholder="Auteur"/>
                </div>
                <div class="form-group">
                    <label for="comment">Commentaire</label><br />
                    <textarea class="form-control" id="comment" name="comment" placeholder="Votre commentaire..."></textarea>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" />
                </div>
            </form>


<?php
while ($comment = $comments->fetch())
{
    ?>
    <li class="media">
        <div class="media-body row">
            <div class="col-md-8 bodyComment">
                <h4 class="media-heading text-uppercase reviews"><?= htmlspecialchars($comment['username']) ?> </h4>

                <p class="media-comment">
                    <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                </p>

            </div>
            <div class="col-md-4 headComment">
                <p> <?= $comment['created_comment_at_fr'] ?>
                    (<a href="index.php?action=updateCommentDisplay&amp;id=<?= $comment['id'] ?>"
                        class="btn btn-xs btn-primary">modifier</a>)</p>

                <a href="index.php?action=deleteSoftComment&amp;id=<?= $comment['id'] ?>"
                   class="btn btn-info btn-lg">
                    <span class="glyphicon glyphicon-trash"></span>Delete
                </a>
            </div>

        </div>
    </li>
    <hr>

    <?php
}
?>
            </div>
        </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>