<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1 class="m-4 p-4"></h1>
<p><a href="index.php" class="ml-3 btn btn-info"><i class="fas fa-list-ul"></i> Retour à la liste des billets</a></p>

<div class="row">
    <div class="container card">
        <div class="card-header">
            <?php
                if(Authentication::isAdmin()){
            ?>
                <div class="text-right">
                    <p><a href="index.php?action=updatePost&amp;id=<?= $post[0] ?>" class="btn btn-primary" >Modifier l'article</a></p>
                </div>
            <?php
                }
            ?>
            <h3>
                <?= htmlspecialchars($post[1]) ?>
            </h3>
            <div class="text-muted">
                <em>le <?php $date = new DateTime($post['created_at']);
                    echo $date->format('d-m-Y'); ?></em>
            </div>
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
            <li><a href="index.php?action=addComment&amp;id=<?= $post[0] ?>">  <h4 ><i class="far fa-plus-square"></i></h4>
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
                                <h4 class="media-heading text-uppercase reviews"><i class="fas fa-user-circle"></i> <?= htmlspecialchars($comment['username']) ?> </h4>

                                <p class="media-comment">
                                    <?= $comment['comment'] ?>
                                </p>

                            </div>
                            <div class="col-md-5 headComment">
                                <p> <i class="far fa-clock"></i> <em>le <?php $date = new DateTime($comment['created_at']);
                                    echo $date->format('d-m-Y H:i:s'); ?></em>
                            <?php
                            if (Authentication::isLoggedView()) {
                                $checkUser = $userManager->checkUser($_SESSION['user']['email'], $_SESSION['user']['username'], $_SESSION['user']['role'], $comment[0], $comment['id']);
                                if ($checkUser != false) {
                            ?>
                                    <a href="index.php?action=deleteSoftComment&amp;id=<?= $comment['0'] ?>"
                                       class="text-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <a href="index.php?action=updateComment&amp;id=<?= $comment['0'] ?>"
                                       class="text-primary">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                            <?php
                                }
                            }
                            if (Authentication::isLoggedView()) {

                            $isReport = $reportManager->checkReport(intval($comment['0']), $_SESSION['user']['id']);
                                if ($isReport == false) {
                                    ?>
                                    <a href="index.php?action=report&amp;id_comment_pfk=<?= $comment['0'] ?>"
                                       class="text-warning">
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
                    <a href="index.php?action=addComment&amp;id=<?= $post[0] ?>"
                       class="btn btn-xs btn-primary"><i class="far fa-plus-square"></i> Poster un nouveau commentaire...</a>
                </p>
            </ul>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>
