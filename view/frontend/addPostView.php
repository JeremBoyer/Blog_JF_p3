<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
    <h1>Blog de Jean Forteroche!</h1>
    <p>Derniers billets du blog :</p>

    <form action="index.php?action=addPost" method="post">
        <div>
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" />
        </div>
        <div>
            <label for="user_id_fk">Utilisateur</label><br />
            <input type="text" id="user_id_fk" name="user_id_fk" />
        </div>
        <div>
            <label for="category_id_fk">Categorie</label><br />
            <input type="radio" id="Got" name="category_id_fk" value="1" />Got</br>
            <input type="radio" id="SamL" name="category_id_fk" value="2" />SamL</br>
            <input type="radio" id="BreakingBad" name="category_id_fk" value="3" />BreakingBad</br>

        </div>
        <div>
            <label for="content">Article</label><br />
            <textarea id="content" name="content"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>


    <div class="container-fluid">

            <?php

            while ($data = $posts->fetch())
            {
                ?>
        <div class="row">


                    <h3>
                        <?= htmlspecialchars($data['title']) ?>
                        <em>le <?= $data['created_at_fr'] ?></em>

                    </h3>

                    <p>
                        <?= nl2br(htmlspecialchars(substr($data['content'], 0, 200))) ?>
                        <br />
                        <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-xs btn-primary">Lire la suite...</a>

                    </p>


        </div>
                <?php
            }

            $posts->closeCursor();
            ?>

    </div>
<?php $content = ob_get_clean(); ?>

<?php require('template/layout.php'); ?>