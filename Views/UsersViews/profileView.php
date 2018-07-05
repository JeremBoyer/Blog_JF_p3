<?php $title = htmlspecialchars($user['username']); ?>

<?php ob_start(); ?>
    <h1 class="p-4 m-4">Blog de Jean Forteroche!</h1>

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
                    <label for="username"></label><h4>Pseudo</h4>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input class="form-control" type="text" id="username" name="username" value="<?= $user['username'] ?>"/>
                    </div>
                </div>
                <div>
                    <label for="email"></label><h4>Email</h4>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                        <input class="form-control" type="email" id="email" name="email" value="<?= $user['email'] ?>"/>
                    </div>
                </div>
                <div>
                    <label for="pass"></label><h4>Password</h4>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input class="form-control" type="password" id="pass" name="pass"/>
                    </div>
                </div>
                <div>
                    <hr>
                    <input type="submit" class="btn btn-dark btn-block btn-lg" value="Modifier mes informations"/>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>