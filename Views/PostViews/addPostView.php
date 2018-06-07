<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
    <h1>Blog de Jean Forteroche!</h1>
    <p>Derniers billets du blog :</p>

<?php
if(isset($_SESSION['error']) || isset($_SESSION['success'])) {
        $alertType = 'success';
        $message = $_SESSION['success'];
        if(isset($_SESSION['error'])){
            $alertType = 'danger';
            $message = $_SESSION['error'];
        }
        session_destroy();
    ?>

    <div class="alert alert-<?= $alertType?>" role="alert">
        <?= $message ?>
    </div>
    <?php
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

            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" id="Got" name="category_id_fk" value="1" /> Got</br>
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" id="SamL" name="category_id_fk" value="2" /> SamL</br>
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" id="BreakingBad" name="category_id_fk" value="3" /> BreakingBad</br>
                </label>
            </div>
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
                        <?= htmlspecialchars($data['title']) ?>
                        <em>le <?= $data['created_at'] ?></em>

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

<?php require('Views/layout.php'); ?>