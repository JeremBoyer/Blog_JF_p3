<?php $title = "Blog de JF"; ?>

<?php ob_start(); ?>
    <h1>Blog de Jean Forteroche!</h1>
    <p><a href="index.php" class="btn btn-xs btn-primary">Retour à la liste des billets</a></p>

    <div class="row">
        <div class="container">
            <h3> <?= $post['title']?></h3>
            <p>
                <?= $post['content'];?>
            </p>
        </div>
    </div>

    <div class="col-md-offset-2 col-md-8">
        <div class="container">



            <h2>Commentaires</h2>

            <form action="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>" method="post">
                <div>
                    <label for='comment'>Commentaire</label><br />
                    <textarea id='comment' name='comment' ><?= $comment['comment'] ?></textarea>
                </div>
                <div>
                    <input type="submit" />
                </div>
            </form>


        </div>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>