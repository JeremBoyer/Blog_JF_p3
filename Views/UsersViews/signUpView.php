<?php $title = 'Blog de Jean Forteroche'; ?>

<?php ob_start(); ?>
    <h1 class="m-4 p-4">Blog de Jean Forteroche!</h1>


    <div class="p-4 m-4 container-fluid">
        <div class="container">
            <?php
            if (isset($flash)) {
                $flash->flash();
            }
            ?>
            <div class="card card-outline-secondary">
                <div class="card-header">
                    <h3>Inscription</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?action=signUp" method="post">
                        <div>
                            <label for="username"></label><h4>Pseudo</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input class="form-control" type="text" id="username" name="username" placeholder="Votre pseudo"/>
                            </div>
                        </div>
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
                            <label for="confirmation_mail"></label><h4>Confirmation de l'email</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input class="form-control" type="email" id="confirmation_mail"
                                       name="confirmation_mail" placeholder="Confirmez votre email"/>
                            </div>
                        </div>
                        <div>
                            <label for="pass"></label><h4>Password</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input class="form-control" type="password" id="pass" name="pass" placeholder="Votre mot de passe"/>
                            </div>
                        </div>
                        <div>
                            <label for="confirmation_pass"></label><h4>Confirmation du mot de passe</h4>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input class="form-control" type="password" id="confirmation_pass"
                                       name="confirmation_pass" placeholder="Confirmez votre mot de passe"/>
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
                            <input type="submit" class="btn btn-dark btn-block btn-lg" value="S'inscrire"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('Views/layout.php'); ?>