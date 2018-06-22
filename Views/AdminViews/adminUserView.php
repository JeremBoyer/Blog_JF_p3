<?php $title = htmlspecialchars('Tableau de Bord'); ?>

<?php ob_start(); ?>


    <div class="container-fluid">
        <?php
            if(isset($flash)){
                $flash->flash();
            }
        ?>
        <div class="row">
        <div class="col-2"></div>
        <div class="col-9">
        <div class="card text-dark">
            <div class="card-header">
                <i class="fa fa-table"></i>  Administration des utilisateurs</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Pseudo</th>
                            <th>Mail</th>
                            <th>Dates</th>
                            <th>Nombres commentaires</th>
                            <th>Nombres signalement</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($user = $users->fetch()) {
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($user['username']) ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><i class="far fa-clock"></i><?php $date = new DateTime($user['register_at']);
                                    echo $date->format('d-m-Y H:i:s'); ?></td>
                                <td>
                                    <?php
                                        $nbComment = $nbCommentManager->nbComment($user['0']);
                                        if ($nbComment == false) {
                                            echo 0;
                                        } else {
                                            ?>
                                            <?=$nbComment['0']?> <i class="far fa-comments"></i>
                                            <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    $nbUserReport = $nbUserReportManager->nbComment($user['0']);
                                    if ($nbUserReport == false) {
                                        echo 0;
                                    } else {
                                        ?>
                                        <?=$nbUserReport['0']?> <i class="far fa-flag"></i>
                                        <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="index.php?action=deleteSoftUser&amp;id=<?= $user['0'] ?>" title="Désactiver">
                                        <i class="far fa-check-circle text-dark"></i>
                                    </a>
                                    <a href="index.php?action=deleteUser&amp;id=<?= $user['0'] ?>" title="Supprimer">
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

                        </ul>
                    </div>

                </div>
            </div>
        </div>
        </div>
            <div class="col-1"></div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layoutAdmin.php'); ?>