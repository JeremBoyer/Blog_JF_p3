<?php
    session_start();
    $title = 'Blog de Jean Forteroche';

?>

<?php ob_start(); ?>
    <h1>Blog de Jean Forteroche!</h1>
    <div><a href="index.php?action=addPost" class="btn btn-xs btn-primary"><i class="fas fa-feather"></i> Ajouter un article</a></div>

    <p>Derniers billets du blog :</p>
    <div class="container">
        <div class="row">
            <!--Side Bar-->
            <div class="col-lg-3">
                <!--List category-->
                <div class="list-group">
                    <h3>Les catégories :</h3>
                    <?php
                    while ($category = $categories->fetch()) {
                        ?>


                        <div>
                            <a href="index.php?action=getPostsCategory&amp;category_id_fk=<?= $category['id'] ?>"
                                class="list-group-item"><?= $category['title'] ?>
                            </a>
                        </div>


                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php

                    while ($data = $posts->fetch()) {
                        ?>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header">

                                <h3>
                                    <a href="index.php?action=getPostsCategory&amp;category_id_fk=<?= $data['category_id_fk'] ?>"
                                       class="btn btn-xs btn-primary"><?= $data['category_id_fk'] ?></a>
                                    <?= htmlspecialchars($data['title']) ?>
                                    <em>le <?php $date = new DateTime($data['created_at']);
                                            echo $date->format('d-m-Y H:i:s'); ?></em>
                                    <a href="index.php?action=updatePostDisplay&amp;id=<?= $data['id'] ?>"
                                       class="btn btn-xs btn-primary"><i class="fas fa-pencil-alt"></i> Modifier l'article</a>

                                </h3>

                                </div>

                                <p>
                                    <a href="index.php?action=deleteSoftPost&amp;id=<?= $data['id'] ?>"
                                       class="btn btn-warning btn-xs"><i class="fas fa-trash-alt"></i> Désactiver</a>
                                    <a href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>"
                                       class="btn btn-danger btn-xs"><i class="fas fa-trash-alt"></i> Supprimer</a>
                                </p>


                                <p>
                                    <?= nl2br(htmlspecialchars(substr($data['content'], 0, 200))) ?>
                                    <br/>

                                </p>
                                <div class="card-footer">
                                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>"
                                       class="btn btn-xs btn-primary">Lire la suite...</a>

                                </div>
                            </div>
                        </div>
                        <?php
                    }

                    $posts->closeCursor();

                    ?>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>