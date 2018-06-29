<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
<h1>Modifiez votre article!</h1>

<?php
if(isset($flash)){
    $flash->flash();
}
?>
<div class="container-fluid">
    <div class="container updatePostForm">

        <form action="index.php?action=updatePost&amp;id=<?= $post['id'] ?>" method="post">
            <div class="form-group">
                <label for="title"></label><h4>Titre</h4>
                <input class="form-control" type="text" id="title" name="title" value="<?= $post['title']?>" />
            <div class="form-group">
                <label for="category_id_fk"></label><h4>Livres :</h4>
                <?php
                while ($category = $categories->fetch()) {
                    ?>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio"
                                   <?php
                                   if ($post['category_id_fk'] === $category['id']) {
                                       ?>
                                       checked="checked"
                                       <?php
                                   }
                                   ?>
                                   id="<?= $category['title'] ?>"
                                   name="category_id_fk"
                                   value="<?= $category['id'] ?>" />
                            Livres <?= $category['id'] ?> : <?= $category['title'] ?></br>
                        </label>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="form-group">
                <label for="content"></label><h4>Article</h4>
                <textarea id="mytextarea" name="content"> <?= $post['content']?></textarea>
            </div>
            <hr>
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" />
            </div>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>