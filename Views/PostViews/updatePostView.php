<?php $title = 'Modification d\'un article'; ?>

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
                        <i class="fa fa-table"></i>  <h1>Modifiez l'article.</h1>
                    </div>
                    <div class="card-body">
                        <p><a href="index.php" class="ml-3 btn btn-info"><i class="fas fa-list-ul"></i> Retour à la liste des billets</a></p>
                        <div class="container-fluid">
                            <div class="container updatePostForm">
                                <form action="index.php?action=updatePost&amp;id=<?= $post[0] ?>" method="post">
                                    <div class="form-group">
                                        <label for="title"></label><h4>Titre</h4>
                                        <input class="form-control" type="text" id="title" name="title" value="<?= $post[1]?>" />
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
                                                        Livres <?= $category['id'] ?> : <?= $category['title'] ?>
                                                        </br>
                                                </label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="content"></label><h4>Article</h4>
                                        <textarea id="mytextarea" name="content">
                                            <?= $post['content']?>
                                        </textarea>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input class="btn btn-primary btn-block" type="submit" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $content = ob_get_clean(); ?>

<?php require('Views/layoutAdmin.php'); ?>