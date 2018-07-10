<?php
    $title = 'Blog de Jean Forteroche';
?>

<?php ob_start(); ?>

    <!-- Banner -->
    <div class="container">
        <div class="miniban d-md-none justify-content-center m-4 p-4">
            <div>
                <h2 class="display-5 m-3"> Bienvenue sur le blog de Jean Forteroche</h2>
            </div>
            <div class="row">
                <img src="Public/picture/portrait.jpg" class="img-fluid float-right" alt="Responsive image" />
            </div>
        </div>
    </div>
    <div class="ban d-none d-md-block">
        <div class="caption">
            <div class="container jumbotron text-center" id="jumbo">
                <div class="row">
                    <h2 class="display-5"> Bienvenue sur le blog de Jean Forteroche</h2>
                    <div class="col-md-9">
                        <hr>
                        <h4 class="text-left text-secondary">
                            Le mot de l'auteur :
                        </h4>
                        <blockquote class="blockquote text-justify ">
                            <p class="bd-callout bd-callout-info">
                                <em>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tortor libero, ultrices eget magna non, blandit sodales eros. Nulla dignissim sit amet augue sed rutrum. Pellentesque mi velit, dignissim non arcu nec, vulputate ultricies arcu. Ut tempor est in neque varius tempus. Nulla eu feugiat elit. Pellentesque ornare massa a nulla tincidunt molestie. Quisque vel dui mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ."
                                </em>
                            </p>
                            <footer class="blockquote-footer text-dark"> <cite title="Source Title"><strong>Jean Forteroche</strong></cite></footer>
                        </blockquote>
                    </div>
                    <div class="col-md-3 p-4">
                        <img src="Public/picture/portrait.jpg" class="img-fluid float-right" alt="Responsive image" />
                    </div>
                </div>
                <div class="section-btn d-none d-lg-block">
                    <a type="button" href="index.php?action=listCategories" class="btn btn-primary">Plus d'info sur l'auteur</a>
                    <a type="button" href="index.php?action=listCategories" class="btn btn-outline-light"><span class="text-primary">Les oeuvres sur ce site</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner -->

    <h2 class="m-3 p-4" id="subTitle">Derniers billets du blog :</h2>
    <div class="container-fluid">
        <div class="container">
            <div class="row">

            <!-- Extracts -->
                <div class="row">

                    <?php
                    while ($post = $posts->fetch()) {
                    ?>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-info text-white">
                                    <h4>
                                        <?= ($post['title']) ?>
                                    </h4>
                                </div>

                                <div class="postList card-body">
                                    <em class="text-muted listPostAt text-right"><i class="far fa-clock"></i> le <?php $date = new DateTime($post['created_at']);
                                        echo $date->format('d-m-Y H:i:s'); ?>
                                    </em>
                                <p>
                                    <?= (substr($post['content'], 0, 200)) ?>...
                                    <br/>
                                </p>
                                    <?php
                                    $nbComment = $adminManager->nbCommentPerPost($post['0']);
                                    if ($nbComment == false) {
                                        echo 0;
                                    } else {
                                    ?>
                                        <div class="text-right justify-content-end">
                                            <i class="far fa-comments"></i> <?=$nbComment['0']?> commentaire(s)
                                        </div>
                                        <div class="text-dark">

                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="card-footer d-flex justify-content-around">
                                    <div class="text-left pr-4">
                                    <i class="fas fa-user-circle"></i> Jean Forteroche
                                    </div>
                                    <div class="mr-auto pl-4">
                                        <div class="section-btn">
                                            <a href="index.php?action=post&amp;id=<?= $post['id'] ?>" type="button"
                                           class="btn btn-xs btn-primary"><i class="fas fa-glasses"></i> La suite...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }

                    $posts->closeCursor();
                    ?>
                </div>
                <!-- End Extracts -->
            </div>
        </div>
    </div>
<?php
    $pagingService->paging($page, $totalPages);
?>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>