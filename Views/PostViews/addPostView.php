<?php
$title = 'Blog de Jean Forteroche';

?>

<?php ob_start(); ?>
    <h1>Ajoutez un article.</h1>
    <p>Derniers billets du blog :</p>


    <div class="container">
        <?php
        if(isset($flash)){
            $flash->flash();
        }
        ?>
    <form action="index.php?action=addPost" method="post">
        <div class="form-group">
            <label for="title">Titre</label><br />
            <input class="form-control" type="text" id="title" name="title" />
        </div>
        <div class="form-group">
            <label for="user_id_fk">Utilisateur</label><br />
            <input class="form-control" type="text" id="user_id_fk" name="user_id_fk" />
        </div>
        <div class="form-group">
            <label for="category_id_fk">Categorie</label><br />


                <h3>Livres :</h3>
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
            <label for="text">Article</label><br />
            <textarea id="mytextarea" name="content"></textarea>
        </div>
        <div>

            <input type="submit" class="btn btn-dark"/>
        </div>
    </form>



    <div class="container-fluid">

            <?php

            while ($data = $posts->fetch())
            {
                ?>
        <div class="row">


                    <h3>
                        <?= $data['title'] ?>
                        <em>le <?= $data['created_at'] ?></em>

                    </h3>

                    <p>
                        <?= (substr($data['content'], 0, 200)) ?>...
                        <br />
                        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-xs btn-primary">Lire la suite...</a>

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