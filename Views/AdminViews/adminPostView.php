<?php $title = htmlspecialchars('Modération des articles'); ?>

<?php ob_start(); ?>


    <div class="container">
        <?php
        if(isset($flash)){
            $flash->flash();
        }
        ?>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-11">
                <div class="card align-self-end mb-3 text-dark">
                    <div class="card-header">
                        <i class="fa fa-table"></i>  Modération des articles</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Titre</th>
                                    <th>Dates</th>
                                    <th class="text-center">Nombres de commentaires</th>
                                    <th>Numéro du livre</th>
                                    <th>Titre</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($post = $posts->fetch()) {
                                    ?>
                                    <tr>
                                        <td><?= htmlspecialchars($post['title']) ?></td>
                                        <td class="text-center"><i class="far fa-clock"></i> le <?php $date = new DateTime($post['created_at']);
                                            echo $date->format('d-m-Y H:i:s'); ?></td>
                                        <td>
                                            <?php
                                                $nbComment = $nbCommentManager->nbCommentPerPost($post['0']);
                                                if ($nbComment == false) {
                                                    echo 0;
                                                } else {
                                            ?>
                                                    <div>
                                                        <?=$nbComment['0']?> <i class="far fa-comments"></i>
                                                    </div>
                                            <?php
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                $category = $categoryManager->getCategory($post['category_id_fk']);
                                            ?>
                                            <div>
                                                Livres n°<?= $category['id']?>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <?= $category['title']?>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="index.php?action=updatePost&amp;id=<?= $post['0'] ?>" title="Modifier">
                                                <i class="fas fa-pencil-alt text-dark"></i>
                                            </a>
                                            <a href="index.php?action=deleteSoftPost&amp;id=<?= $post['0'] ?>" title="Désactiver">
                                                <i class="far fa-check-circle text-dark"></i>
                                            </a>
                                            <a href="index.php?action=deletePost&amp;id=<?= $post['0'] ?>" title="Supprimer">
                                                <i class="far fa-trash-alt text-dark"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            <div class="container">
                                <ul class="pagination">
                                    <?php
                                    for($i=1;$i<=$totalPages;$i++) {
                                        ?>
                                        <li class="page-item">
                                            <?php
                                            if($i == $page) {
                                                echo '<li class="page-item disabled"><a class="page-link" href="index.php?action=getAdminPost&amp;page='.$i.'">'.$i.'</a></li> ';
                                            } else {
                                                echo '<a class="page-link" href="index.php?action=getAdminPost&amp;page='.$i.'">'.$i.'</a> ';
                                            }
                                            ?>
                                        </li>
                                        <?php
                                    }
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