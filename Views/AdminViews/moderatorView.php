<?php $title = htmlspecialchars('Modération des commentaires'); ?>

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
                        <td><i class="far fa-clock"></i><?php $date = new DateTime($comment['created_at']);
                            echo $date->format('d-m-Y H:i:s'); ?></td>
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
                            <a href="index.php?action=updateComment&amp;id=<?= $comment['0'] ?>" title="Modifier">
                                <i class="fas fa-pencil-alt text-dark"></i>

                            </a>
                            <a href="index.php?action=deleteSoftComment&amp;id=<?= $comment['0'] ?>" title="Désactiver">
                                <i class="far fa-check-circle text-dark"></i>
                            </a>
                            <a href="index.php?action=deleteComment&amp;id=<?= $comment['0'] ?>" title="Supprimer">
                                <i class="far fa-trash-alt text-dark"></i>
                            </a>
                        </td>
                    </tr>

                    <?php
                }
                ?>
                    </tbody>
                </table>
                <?php
                $pagingService->paging($page, $totalPages);
                ?>

            </div>
        </div>
    </div>
    </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layoutAdmin.php'); ?>