<?php ob_start(); ?>
<h1>Blog de Jean Forteroche!</h1>
<div class="container">
    <p><a href="index.php" class="btn btn-xs btn-primary">Retour à la liste des billets</a></p>
</div>

        <div class="container-fluid">
            <div class="container">

            <h2>Livre <?= $isCategory['id']?> : <?= $isCategory['title']?> </h2>

            <hr>
            <div class="tab-content">
            <ul class="media-list">
            <?php
            while ($post = $posts->fetch())
            {
                ?>
                <li class="media">
                <div class="media-body row">
                    <div class="p-3">
                        <div class="text-right">
                            <?php
                                if (Authentication::isAdmin()) {
                            ?>
                                    <a href="index.php?action=updatePost&amp;id=<?= $post[0] ?>"
                                       class="btn btn-xs btn-info"><i class="fas fa-pencil-alt"></i> Modifier l'article</a>
                                    <a href="index.php?action=deleteSoftPost&amp;id=<?= $post[0] ?>"
                                       class="btn btn-warning btn-xs"><i class="fas fa-trash-alt"></i> Désactiver</a>
                                    <a href="index.php?action=deletePost&amp;id=<?= $post[0] ?>"
                                       class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i> Supprimer</a>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="text-left">
                            <h3><?= $post['postTitle'] ?></h3>
                        </div>
                        <div class="text-right">
                            <i class="far fa-clock"></i> <em>le <?php $date = new DateTime($post['created_at']);
                                echo $date->format('d-m-Y H:i:s'); ?></em>
                        </div>
                    <p><?= $post['content'] ?></p>
                        <hr>
                        <div class="text-center">
                        <a href="index.php?action=post&amp;id=<?= $post['id'] ?>"
                           class="btn btn-xs btn-primary btn-block"><i class="fas fa-glasses"></i> Lire la suite...</a>
                        </div>
                    </div>
                </div>
                </li>

                <hr>

                <?php
            }
            ?>
            </ul>
            </div>
        </div>
        </div>



<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>
