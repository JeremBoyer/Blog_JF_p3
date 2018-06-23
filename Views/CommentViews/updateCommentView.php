<?php $title = "Blog de JF"; ?>

<?php ob_start(); ?>
    <h1>Blog de Jean Forteroche!</h1>
    <p><a href="index.php" class="btn btn-xs btn-primary">Retour à la liste des billets</a></p>
<div class="container">
    <div class="row">
        <div class="container card">
            <div class="card-header">
                <h3>
                    <?= htmlspecialchars($post['title']) ?>
                </h3>
                <div class="text-muted">
                    <em>le <?php $date = new DateTime($post['created_at']);
                        echo $date->format('d-m-Y H:i:s'); ?></em>
                </div>
            </div>

            <div class="card-body">
                <p>
                    <?= ($post['content']) ?>
                </p>
            </div>
        </div>
    </div>
</div>

        <div class="container">
            <?php
            if(isset($flash)){
            $flash->flash();
            }
            ?>
            <form action="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>" method="post">
                    <div class="form-group">
                        <label for="comment"><h2>Modifiez le commentaire</h2></label><br />
                        <textarea class="form-control" id="mytextarea" name="comment" ><?= $comment['comment'] ?></textarea>
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" />
                    </div>
            </form>
        </div>


<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>