<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
<h1>Blog de Jean Forteroche!</h1>

<?php
if (isset($_SESSION['error']) || isset($_SESSION['success'])) {
    $alertType = 'success';
    $message = $_SESSION['success'];
    //$alertType = isset($_SESSION['error']) ? 'danger' : null;
    if (isset($_SESSION['error'])) {
        $alertType = 'danger';
        $message = $_SESSION['error'];
    }
    session_destroy();
    ?>

    <div class="alert alert-<?= $alertType ?>" role="alert">
        <?= $message ?>
    </div>
    <?php
}
?>
<div class="container">
<div class="card card-outline-secondary">
    <div class="card-header">
        <h3>Inscription</h3>
    </div>
    <div class="card-body">
        <form action="index.php?action=signUp" method="post">
            <div>
                <label for="username">Pseudo</label><br/>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input class="form-control" type="text" id="username" name="username"/>
                </div>
            </div>
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
                <label for="confirmation_mail">Confirmation de l'email</label><br/>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input class="form-control" type="email" id="confirmation_mail" name="confirmation_mail"/>
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
                <label for="confirmation_pass">Confirmation du password</label><br/>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input class="form-control" type="password" id="confirmation_pass" name="confirmation_pass"/>
                </div>
            </div>
            <div>
                <div class="input-group input-select">
                    <label for="role">Role</label><br/>
                    <select class="custom-select d-block w-100" id="role" name="role">
                        <option value>Role</option>
                        <option>Admin</option>
                        <option>Contributeur</option>
                    </select>
                </div>
            </div>
            <div>
                <hr>
                <input type="submit" class="btn btn-dark btn-block" value="S'inscrire"/>
            </div>
        </form>
    </div>
</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>