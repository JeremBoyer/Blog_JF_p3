<?php
$title = 'Blog de Jean Forteroche';
?>

<?php ob_start(); ?>
    <h1 class="p-4 m-4">Ajoutez un article.</h1>
    <p>Derniers billets du blog :</p>


    <div class="container">
        <?php
        if(isset($flash)){
            $flash->flash();
        }
        ?>
    <form action="index.php?action=addPost" method="post">
        <div class="form-group">
            <label for="title"></label><h4>Titres :</h4>
            <input class="form-control" type="text" id="title" name="title" />
        </div>
        <div class="form-group">
            <label for="user_id_fk"></label><br />
            <input class="form-control" type="hidden" id="user_id_fk" name="user_id_fk" value="<?= $_SESSION['user']['id']?>" />
        </div>
        <div class="form-group">
            <label for="category_id_fk"></label><h4>Livres :</h4>
                <?php
                while ($category = $categories->fetch()) {
                    ?>


                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio"
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
            <label for="text"></label><h4>Article</h4>
            <textarea id="mytextarea" name="content"></textarea>
        </div>
        <div>

            <input type="submit" class="btn btn-dark"/>
        </div>
    </form>



    <div class="container-fluid">

            <?php

            while ($post = $posts->fetch())
            {
                ?>
        <div class="row">


                    <h3>
                        <?= $post['title'] ?>
                        <em>le <?php $date = new DateTime($post['created_at']);
                            echo $date->format('d-m-Y H:i:s'); ?></em>

                    </h3>

                    <p>
                        <?= (substr($post['content'], 0, 200)) ?>...
                        <br />
                        <a href="index.php?action=post&amp;id=<?= $post['id'] ?>" class="btn btn-xs btn-primary">Lire la suite...</a>

                    </p>


        </div>
                <?php
            }

            $posts->closeCursor();
            ?>

    </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>