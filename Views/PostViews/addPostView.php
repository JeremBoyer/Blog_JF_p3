<?php
$title = 'Ajout d\'un article';
?>

<?php ob_start(); ?>
    <div class="container">
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-11">
                <?php
                if(isset($flash)){
                    $flash->flash();
                }
                ?>
                <div class="card align-self-end mb-3 text-dark">
                    <div class="card-header">
                        <i class="fa fa-table"></i>  <h1>Ajoutez un article.</h1>
                    </div>
                    <div class="card-body">
                        <p><a href="index.php" class="ml-3 btn btn-info"><i class="fas fa-list-ul"></i> Retour à la liste des billets</a></p>

                        <div class="container">
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
                                                       Livres <?= $category['id'] ?> : <?= $category['title'] ?>
                                                    </br>
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
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="container-fluid">
                        <h3 class="m-4">Les articles</h3>
                        <div class="card-body container">
                            <div class="tab-content">
                                <ul class="media-list">
                                    <?php
                                    while ($post = $posts->fetch())
                                    {
                                        ?>
                                        <li class="media">
                                            <div class="media-body row">
                                                <div class="col-md-7 bodyComment">
                                                    <h4 class="media-heading text-uppercase reviews"> <?= htmlspecialchars($post['title']) ?> </h4>
                                                    <p class="media-comment">
                                                        <?= (substr($post['content'], 0, 200)) ?>...
                                                        <br />
                                                    </p>
                                                </div>
                                                <div class="col-md-5 headComment">
                                                    <p> <i class="far fa-clock"></i> <em>le <?php $date = new DateTime($post['created_at']);
                                                            echo $date->format('d-m-Y H:i:s'); ?></em></p>
                                                    <a href="index.php?action=deleteSoftPost&amp;id=<?= $post['0'] ?>"
                                                       class="text-danger">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                    <a href="index.php?action=updatePost&amp;id=<?= $post['0'] ?>"
                                                       class="text-primary">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <br/>
                                                    <a href="index.php?action=post&amp;id=<?= $post['id'] ?>" class="btn btn-xs btn-primary m-2">
                                                        Lire la suite...
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    $posts->closeCursor();
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layoutAdmin.php'); ?>