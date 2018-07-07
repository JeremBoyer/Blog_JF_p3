<?php $title = 'Présentation de l\'auteur'; ?>

<?php ob_start(); ?>
    <h1 class="p-4 m-4">Blog de Jean Forteroche!</h1>
    <div class="container-fluid">
        <div class="container jumbotron text-center" id="jumbo">
            <div class="row">
                <div class="col-md-3">
                    <img src="Public/picture/portrait.jpg" class="img-fluid float-right" alt="Responsive image" />
                </div>
                <div class="col-md-9">
                    <h2 class="display-5"> Présentation de Jean Forteroche</h2>
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
            </div>
            <div class="row">
                <div class="col-6">
                <h4 class="text-dark">
                    Formation :
                </h4>
                <p >
                    - Lettres Classiques (Université Paris Sorbonne)</br>
                    - Sciences Politiques Paris (Université Paris Sorbonne)
                </p>
                    <h4 class="text-dark">
                        Citation :
                    </h4>
                    <p >
                        <strong><em>Si rien ne change, rien ne change...</em></strong>
                    </p>
                </div>
                <div class="col-6">
                <h4 class="text-dark">
                    Bibliographie :
                </h4>
                <ul class="list-group-item list-group-item-primary "><strong>
                    <li class="list-group-item list-group-item-info">Jacky s'en va en guerre.</li>
                    <li class="list-group-item list-group-item-info">Les Fleurs de la tentation.</li>
                    <li class="list-group-item list-group-item-info">Il voulait partir.</li>
                    <li class="list-group-item list-group-item-info">Le feu de la tempête.</li>
                    <li class="list-group-item list-group-item-info">Le rouge.</li>
                    <li class="list-group-item list-group-item-info">L'inspiration.</li>
                    <li class="list-group-item list-group-item-info">Jacky s'en va en guerre.</li>
                    </strong>
                </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-center">
                <h2>
                    Les oeuvres publiées sur le site.
                </h2>
            </div>
            <div class="row">
        <?php
        while ($category = $categories->fetch()) {
        ?>
                <div class="col-6">
                    <ul class="list-group p-4">
                        <a href="index.php?action=getPostsCategory&amp;category_id_fk=<?= $category['id'] ?>"
                           class="nav-link dropdown-item">
                            <li class="list-group-item list-group-item-action list-group-item-info">
                                <h4>Livre n°<?= htmlspecialchars($category['id']) ?> : <?= htmlspecialchars($category['title']) ?></h4>
                            </li>
                        </a>
                    <?php
                    $posts = $postsByCatManager->getPostsCategory($category['id']);
                    while ($post = $posts->fetch()) {
                    ?>
                        <a href="index.php?action=post&amp;id=<?= $post[0] ?>" class="text-dark">
                            <li class="list-group-item list-group-item-action list-group-item-dark d-flex">

                                <strong><?=htmlspecialchars($post['postTitle'])?></strong>

                                <i class="fas fa-caret-right ml-auto align-content-center"></i>
                            </li>
                        </a>
                    <?php
                    }
                    ?>
                    </ul>
                 </div>
        <?php
        }
        ?>
            </div>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>