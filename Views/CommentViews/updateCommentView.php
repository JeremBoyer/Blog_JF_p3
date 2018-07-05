<?php $title = htmlspecialchars($post[1]); ?>

<?php ob_start(); ?>
    <h1 class="p-4 m-4">Blog de Jean Forteroche!</h1>
    <p><a href="index.php?action=post&amp;id=<?=$post[0]?>" class="ml-3 btn btn-info"> Retour à l'article</a></p>
<div class="container">
    <div class="row">
        <div class="container card">
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
</div>

<div class="container-fluid m-4 p-4">
    <div class="container">
    <?php
    if(isset($flash)){
    $flash->flash();
    }
    ?>
        <form action="index.php?action=updateComment&amp;id=<?= $commentToUp['id'] ?>" method="post">
            <div class="form-group">
                <label for="comment"><h2>Modifiez le commentaire</h2></label><br />
                <textarea class="form-control" id="mytextarea" name="comment" ><?= $commentToUp['comment'] ?></textarea>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" />
            </div>
        </form>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>