<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Blog de Jean Forteroche!</h1>
<p><a href="index.php" class="btn btn-xs btn-primary">Retour à la liste des billets</a></p>

<div class="row">
    <div class="container card">
        <div class="card-header">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
            </h3>
            <div class="text-muted">
                <em>le <?= $post['created_at_fr'] ?></em>
            </div>
            <?php
                if(Authentication::isLogged()){
            ?>
            <div>
                <p><a href="index.php?action=updatePost&amp;id=<?= $post['id'] ?>" >Modifier l'article</a></p>
            </div>
            <?php
                }
            ?>
        </div>

        <div class="card-body">
            <p>
                <?= ($post['content']) ?>
            </p>
        </div>
    </div>
</div>


<div class="container">
    <div class="comment-tabs">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a><h4
                            class="reviews text-capitalize">Les commentaires</h4></a></li>
            <li><a href="index.php?action=addComment&amp;id=<?= $post['id'] ?>"><h4 ><i class="far fa-plus-square"></i></h4>
                </a></li>
        </ul>


        <div class="tab-content">
            <ul class="media-list">

                <?php
                while ($comment = $comments->fetch()) {
                    ?>
                    <li class="media">
                        <div class="media-body row">
                            <div class="col-md-7 bodyComment">
                                <h4 class="media-heading text-uppercase reviews"><?= htmlspecialchars($comment['username']) ?> </h4>

                                <p class="media-comment">
                                    <?= nl2br(htmlspecialchars($comment['comment'])) ?>
                                </p>

                            </div>
                            <div class="col-md-5 headComment">
                                <p> <i class="far fa-clock"></i><?= $comment['created_comment_at_fr'] ?>
                                    <a href="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>"
                                       class="btn btn-xs btn-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a href="index.php?action=deleteSoftComment&amp;id=<?= $comment['id'] ?>"
                                       class="btn btn-danger btn-xs">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                            <?php
                                if (Authentication::isLogged()) {

                                $isReport = $reportManager->checkReport(intval($comment['id']), $_SESSION['user']['id']);
                                    if ($isReport == false) {
                                        ?>
                                        <a href="index.php?action=report&amp;id_comment_pfk=<?= $comment['id'] ?>"
                                           class="btn btn-warning btn-xs">
                                            <i class="far fa-flag"></i>
                                        </a>
                            <?php
                                    } else {
                            ?>
                                <p><em>Vous avez signalé ce commentaires!</em></p>
                            <?php
                                    }
                                }
                            ?>
                            </div>

                        </div>
                    </li>
                    <hr>

                    <?php
                }
                ?>
                <p>
                    <a href="index.php?action=addComment&amp;id=<?= $post['id'] ?>"
                       class="btn btn-xs btn-primary">Poster un nouveau commentaire...</a>
                </p>
            </ul>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>
