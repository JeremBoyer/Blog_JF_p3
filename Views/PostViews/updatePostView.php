<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
<h1>Blog de Jean Forteroche!</h1>
    <p>Derniers billets du blog :</p>

        <form action="index.php?action=updatePost&amp;id=<?= $post['id'] ?>" method="post">
            <div>
                <label for="title">Titre</label><br />
                <input type="text" id="title" name="title" value="<?= $post['title']?>" />
            </div>


            <div>
                <label for="content">Article</label><br />
                <textarea id="content" name="content"> <?= $post['content']?></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>


<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>