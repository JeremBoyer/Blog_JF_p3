<?php ob_start(); ?>
<h1>Blog de Jean Forteroche!</h1>
<p><a href="index.php" class="btn btn-xs btn-primary">Retour à la liste des billets</a></p>

    <div class="col-md-offset-2 col-md-8">
        <div class="container">

            <h2>Category: </h2>


            <?php
            while ($post = $posts->fetch())
            {
                ?>
                <div class="row">
                    <p><strong><?= htmlspecialchars($post['postTitle']) ?></strong> le <?= $post['created_at'] ?>

                    <p><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                    <p>


                    </p>
                </div>

                <?php
            }
            ?>

        </div>

    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>
