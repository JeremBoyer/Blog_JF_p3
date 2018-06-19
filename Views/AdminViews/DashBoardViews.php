
<?php $title = htmlspecialchars('Tableau de Bord'); ?>

<?php ob_start(); ?>

<div class="content-wrapper">
    <div class="container">
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-6 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div>
                            <i class="far fa-file-alt"></i>
                        </div>
                        <div class="mr-5">Vous avez publié <?=$nbPosts['nbPosts']?> articles!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Voir la liste!</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div>
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="mr-5">Votre communauté compte <?=$nbUsers['nbUsers']?> membres!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Voir la liste!</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div>
                            <i class="far fa-comments"></i>
                        </div>
                        <div class="mr-5">Il y a <?=$nbComments['nbComments']?> commentaires sur le blog.</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Voir la liste!</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div>
                            <i class="far fa-flag"></i>
                        </div>
                        <div class="mr-5"><?=$nbReported['nbReported']?> commentaires ont été signalés.</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">Voir le détail!</span>
                        <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('Views/layoutAdmin.php'); ?>