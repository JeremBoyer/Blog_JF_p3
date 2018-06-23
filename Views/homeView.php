<?php
    $title = 'Blog de Jean Forteroche';
?>

<?php ob_start(); ?>

    <!-- Banner -->

    <div class="ban">
        <div class="caption">
            <div class="container jumbotron text-center" id="jumbo">
                <div class="row">
                    <div class="col-md-9">
                        <h2 class="display-5"> Bienvenue sur le blog de Jean Forteroche</h2>
                        <hr>
                        <h4 class="text-left text-secondary">
                            Le mot de l'auteur :
                        </h4>
                        <blockquote class="blockquote text-justify ">
                            <p class="bd-callout bd-callout-info">
                                <em>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tortor libero, ultrices eget magna non, blandit sodales eros. Nulla dignissim sit amet augue sed rutrum. Pellentesque mi velit, dignissim non arcu nec, vulputate ultricies arcu. Ut tempor est in neque varius tempus. Nulla eu feugiat elit. Pellentesque ornare massa a nulla tincidunt molestie. Quisque vel dui mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce malesuada molestie nunc, quis blandit turpis. Vivamus id bibendum dolor. Sed nibh nibh, mattis ac gravida viverra, pretium ac lacus. Donec neque dui, fermentum et arcu sit amet, venenatis mattis risus. Proin non pretium erat. "
                                </em>
                            </p>
                            <footer class="blockquote-footer text-dark"> <cite title="Source Title"><strong>Jean Forteroche</strong></cite></footer>
                        </blockquote>
                    </div>
                    <div class="col-md-3">
                        <img src="Public/picture/portrait.jpg" class="img-fluid float-right" alt="Responsive image" />
                    </div>
                </div>
                <div class="section-btn">
                    <a type="button" href="" class="btn btn-primary">Plus d'info sur l'auteur</a>
                    <a type="button" href="" class="btn btn-outline-light" ">Les oeuvres</a>
                </div>


            </div>
        </div>
    </div>
        <!-- End Banner -->

    <h2 id="subTitle">Derniers billets du blog :</h2>
    <div class="container-fluid">
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
            <!-- Extracts -->
            <div class="col-lg-9">
                <div class="row">

                    <?php
                    while ($post = $posts->fetch()) {
                        ?>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-info text-white">
                                    <em class="text-muted listPostAt">le <?php $date = new DateTime($post['created_at']);
                                        echo $date->format('d-m-Y H:i:s'); ?>
                                    </em>

                                    <h3>
                                        <?= ($post['title']) ?>
                                    </h3>
                                </div>

                                <div class="postList">
                                <p>
                                    <?= (substr($post['content'], 0, 200)) ?>
                                    <br/>
                                </p>
                                </div>
                                <div class="card-footer">
                                    <a href="index.php?action=post&amp;id=<?= $post['id'] ?>"
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
<div class="container">
    <ul class="pagination">
<?php
for($i=1;$i<=$totalPages;$i++) {
    ?>
    <li class="page-item">
        <?php
    if($i == $page) {
        echo '<li class="page-item disabled"><a class="page-link" href="index.php?action=listPosts&amp;page='.$i.'">'.$i.'</a></li> ';
    } else {
        echo '<a class="page-link" href="index.php?action=listPosts&amp;page='.$i.'">'.$i.'</a> ';
    }
    ?>
    </li>
    <?php
}
?>
    </ul>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('layout.php'); ?>