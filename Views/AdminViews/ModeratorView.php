<?php $title = htmlspecialchars('Tableau de Bord'); ?>

<?php ob_start(); ?>


<div class="container">
    <div class="card align-self-end mb-3 text-dark">
        <div class="card-header">
            <i class="fa fa-table"></i>  Modération des commentaires</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Mail</th>
                        <th>Dates</th>
                        <th>Article</th>
                        <th>Commentaire</th>
                        <th>Signalé</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                while ($comment = $comments->fetch()) {
                    ?>
                    <tr
                        <?php
                            $isReportAdmin = $reportAdmin->checkReportAlert($comment[0]);
                            if ($isReportAdmin ==  false) {
                        ?>
                                class="table-default"
                        <?php
                            } else {
                        ?>
                                class="bg-danger text-white"
                        <?php
                            }
                        ?>
                    >
                        <td><?= htmlspecialchars($comment['username']) ?></td>
                        <td><?= $comment['email'] ?></td>
                        <td><i class="far fa-clock"></i><?= $comment['created_at'] ?></td>
                        <td><?= $comment['title'] ?></td>
                        <td><?= $comment['comment'] ?></td>
                        <td>
                            <?php
                                $nbReport = $nbReportManager->nbReport($comment['0']);
                                if ($nbReport == false) {
                                    echo 0;
                                } else {
                            ?>
                            <?=$nbReport['0']?> <i class="far fa-flag"></i>
                            <?php
                                }
                            ?>
                        </td>
                        <td>
                            <a href="index.php?action=updateComment&amp;id=<?= $comment['id'] ?>" title="Modifier">
                                <i class="fas fa-pencil-alt text-dark"></i>

                            </a>
                            <a href="index.php?action=deleteSoftComment&amp;id=<?= $comment['id'] ?>" title="Désactiver">
                                <i class="far fa-check-circle text-dark"></i>
                            </a>
                            <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>" title="Supprimer">
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
                                        echo '<li class="page-item disabled"><a class="page-link" href="index.php?action=getModeration&amp;page='.$i.'">'.$i.'</a></li> ';
                                    } else {
                                        echo '<a class="page-link" href="index.php?action=getModeration&amp;page='.$i.'">'.$i.'</a> ';
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

<?php $content = ob_get_clean(); ?>

<?php require('Views/layoutAdmin.php'); ?>