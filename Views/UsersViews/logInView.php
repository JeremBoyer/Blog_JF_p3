<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
    <h1>Blog de Jean Forteroche!</h1>
    <p>Derniers billets du blog :</p>

<?php
if(isset($flash)){
$flash->flash();
}
?>
    <div class="container">
        <div class="card card-outline-secondary">
            <div class="card-header">

                    <div class="text-left">
                        <h3>    Connexion</h3>
                    </div>
                    <div class="text-muted text-right">
                        <a class="text-muted text-right" href="index.php?action=signUp"><span class="text-left text-muted">Pas encore membre? Inscrivez-vous ici.</span></a>
                    </div>

            </div>
            <div class="card-body">
                <form action="index.php?action=logIn" method="post">
                    <div>
                        <label for="email">Email</label><br/>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-at"></i></span>
                            </div>
                            <input class="form-control" type="email" id="email" name="email"/>
                        </div>
                    </div>
                    <div>
                        <label for="pass">Password</label><br/>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input class="form-control" type="password" id="pass" name="pass"/>
                        </div>
                    </div>
                    <div>
                        <hr>
                        <input type="submit" class="btn btn-dark btn-block" value="Connexion"/>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>