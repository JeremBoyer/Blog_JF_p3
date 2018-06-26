<?php
$title = 'Blog de Jean Forteroche';
?>

<?php ob_start(); ?>
    <h1 class="m-4 p-4">Blog de Jean Forteroche!</h1>



    <div class="container-fluid m-4 p-4">
        <div class="container">
            <?php
            if (isset($flash)) {
                $flash->flash();
            }
            ?>
            <div class="card card-outline-secondary">
                <div class="card-header">

                    <div class="text-left">
                        <h3> Connexion</h3>
                    </div>
                    <div class="text-muted text-right">
                        <a class="text-muted text-right" href="index.php?action=signUp"><span
                                    class="text-left text-muted">Pas encore membre? Inscrivez-vous ici.</span></a>
                    </div>

                </div>
                <div class="card-body">
                    <form action="index.php?action=logIn" method="post">
                        <div>
                            <label for="email"></label><h4>Email</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Votre email"/>
                            </div>
                        </div>
                        <div>
                            <label for="pass"></label><h4>Mot de passe</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input class="form-control" type="password" id="pass" name="pass" placeholder="Votre mot de passe"/>
                            </div>
                        </div>
                        <div>
                            <hr>
                            <input type="submit" class="btn btn-dark btn-block btn-lg" value="Connexion"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>