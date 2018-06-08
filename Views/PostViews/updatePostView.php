<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
<h1>Modifiez votre article!</h1>
    <p>Derniers billets du blog :</p>

<?php
if(isset($flash)){
    $flash->flash();
}
?>

    <div class="container updatePostForm">

        <form action="index.php?action=updatePost&amp;id=<?= $post['id'] ?>" method="post">
            <div class="form-group">
                <label for="title">Titre</label><br />
                <input class="form-control" type="text" id="title" name="title" value="<?= $post['title']?>" />
            </div>
            <div class="form-group">
                <label for="content">Article</label><br />
                <textarea id="mytextarea" name="content"> <?= $post['content']?></textarea>
            </div>
            <hr>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" />
            </div>
        </form>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>