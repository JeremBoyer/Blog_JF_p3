<?php
    $title = 'Blog de Jean Forteroche';

?>

<?php ob_start(); ?>

    <!-- Banner -->

    <div class="jumbotron">

        <div class="container">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div>
        <img id="imgBanner" src="Public/picture/ban.jpg" alt=" Banner " />
    </div>
    <!--
        <section class="container-fluid banner">
            <div class="ban">
                <div class="container">
                    <div class="inner-banner jumbotron">
                        <div class="row"></div>
                            <div class="col-md-9">
                                <h2 class="display-3"> Bienvenue sur le blog de Jean Forteroche</h2>
                                <hr>
                                <h4 id="subTitleBanner">
                                    Le mot de l'auteur :
                                </h4>
                                <p id="wordAuth">
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tortor libero, ultrices eget magna non, blandit sodales eros. Nulla dignissim sit amet augue sed rutrum. Pellentesque mi velit, dignissim non arcu nec, vulputate ultricies arcu. Ut tempor est in neque varius tempus. Nulla eu feugiat elit. Pellentesque ornare massa a nulla tincidunt molestie. Quisque vel dui mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce malesuada molestie nunc, quis blandit turpis. Vivamus id bibendum dolor. Sed nibh nibh, mattis ac gravida viverra, pretium ac lacus. Donec neque dui, fermentum et arcu sit amet, venenatis mattis risus. Proin non pretium erat. Suspendisse quis est dolor. Ut fringilla urna ut nunc commodo ornare. Vivamus maximus cursus libero, eget elementum nunc..."
                                </p>
                            </div>
                            <div class="col-md-3">

                            </div>
                    </div>
                </div>
                <img id="imgBanner" src="Public/picture/ban.jpg" alt=" Banner " />
            </div>

        </section>
        -->
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
                    while ($data = $posts->fetch()) {
                        ?>

                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <div class="card-header bg-info text-white">
                                    <em class="text-muted listPostAt">le <?php $date = new DateTime($data['created_at']);
                                        echo $date->format('d-m-Y H:i:s'); ?>
                                    </em>

                                    <h3>
                                        <?= ($data['title']) ?>
                                    </h3>
                                </div>

                                <div class="postList">
                                <p>
                                    <?= (substr($data['content'], 0, 200)) ?>
                                    <br/>
                                </p>
                                </div>
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