<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
    <h1>Blog de Jean Forteroche!</h1>
    <p>Derniers billets du blog :</p>


<div class="container">
    <?php
    if (isset($flashPass)) {
        $flashPass->flash();
    }
    if (isset($flash)) {
        $flash->flash();
    }
    ?>
    <div class="card card-outline-secondary">
        <div class="card-header">
            <h3>Modifier les informations de mon profil</h3>
        </div>
        <div class="card-body">
            <form action="index.php?action=profile&id=<?= $user['id'] ?>" method="post">
                <div>
                    <label for="username">Pseudo</label><br/>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control" type="text" id="username" name="username" value="<?= $user['username'] ?>"/>
                    </div>
                </div>
                <div>
                    <label for="email">Email</label><br/>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                        <input class="form-control" type="email" id="email" name="email" value="<?= $user['email'] ?>"/>
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
                    <input type="submit" class="btn btn-dark btn-block" value="Modifier mes informations"/>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>