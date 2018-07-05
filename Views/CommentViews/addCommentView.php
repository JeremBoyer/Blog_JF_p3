<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
    <h1 class="p-4 m-4">Ajouter un commentaire</h1>
    <a href="index.php?action=post&amp;id=<?=$post[0]?>" class="ml-3 btn btn-info"> Retour à l'article</a>

    <div class="row">
        <div class="container card mb-3">
            <div class="card-header">
                <h3>
                    <?= htmlspecialchars($post[1]) ?>
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
    <div class="container-fluid">
        <div class="container">
            <?php
            if(isset($flash)){
            $flash->flash();
            }
            ?>

            <form action="index.php?action=addComment&amp;id=<?= $post[0] ?>" method="post">
                <div class="form-group">
                    <label for="user_id_fk"></label><br />
                    <input class="form-control" type="hidden" id="user_id_fk" name="user_id_fk" value="<?=$_SESSION['user']['id']?>"/>
                </div>
                <div class="form-group">
                    <label for="comment"><h3>Commentaire</h3></label><br />
                    <textarea class="form-control" id="mytextarea" name="comment" placeholder="Votre commentaire..."></textarea>
                </div>
                <div>
                    <input class="btn btn-primary" type="submit" />
                </div>
            </form>
            <hr>

            <h2>Les commentaires</h2>
            <hr>
<?php
while ($comment = $comments->fetch())
{
    ?>
    <li class="media">
        <div class="media-body row">
            <div class="col-md-7 bodyComment">
                <h4 class="media-heading text-uppercase reviews">
                    <i class="fas fa-user-circle"></i> <?= htmlspecialchars($comment['username']) ?>
                </h4>

                <p class="media-comment">
                    <?= $comment['comment'] ?>
                </p>
            </div>
            <div class="col-md-5 headComment">
                <p> <i class="far fa-clock"></i> <em>le  <?php $date = new DateTime($comment['created_at']);
                    echo $date->format('d-m-Y H:i:s'); ?> </em>
                <?php
                if (Authentication::isLoggedView()) {
                    $checkUser = $userManager->checkUser($_SESSION['user']['email'], $_SESSION['user']['username'], $_SESSION['user']['role'], $comment[0], $comment['id']);
                    if ($checkUser != false) {
                ?>
                        <a href="index.php?action=updateComment&amp;id=<?= $comment[0] ?>"
                           class="text-primary">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="index.php?action=deleteSoftComment&amp;id=<?= $comment[0] ?>"
                           class="text-danger">
                            <i class="far fa-trash-alt"></i>
                        </a>
                <?php
                    }
                }
                if (Authentication::isLoggedView()) {
                    $isReport = $reportManager->checkReport(intval($comment[0]), $_SESSION['user']['id']);

                    if ($isReport == false) {
                ?>
                        <a href="index.php?action=report&amp;id_comment_pfk=<?= $comment[0] ?>"
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
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>