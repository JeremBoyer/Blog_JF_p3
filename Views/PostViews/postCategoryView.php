<?php ob_start(); ?>
<h1>Blog de Jean Forteroche!</h1>
<div class="container">
    <p><a href="index.php" class="btn btn-xs btn-primary">Retour à la liste des billets</a></p>
</div>

        <div class="container">

            <h2>Livre <?= $isCategory['id']?> : <?= $isCategory['title']?> </h2>

            <hr>
            <?php
            while ($post = $posts->fetch())
            {
                ?>

                <div class="row">
                    <div>
                        <div class="text-right">
                            <?php
                                if (Authentication::isAdmin()) {
                            ?>
                                    <a href="index.php?action=updatePostDisplay&amp;id=<?= $post['id'] ?>"
                                       class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i> Modifier l'article</a>
                                    <a href="index.php?action=deleteSoftPost&amp;id=<?= $post['id'] ?>"
                                       class="btn btn-warning btn-xs"><i class="fas fa-trash-alt"></i> Désactiver</a>
                                    <a href="index.php?action=deletePost&amp;id=<?= $post['id'] ?>"
                                       class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i> Supprimer</a>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="text-left">
                            <h3><?= $post['postTitle'] ?></h3>
                        </div>
                        <div class="text-right">
                            <em>le <?= $post['created_at'] ?></em>
                        </div>
                    <p><?= $post['content'] ?></p>

                    </div>
                </div>

                <hr>

                <?php
            }
            ?>

        </div>



<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>
