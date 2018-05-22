<?php

use Blog\Model\UserManager;

require_once 'Model/UserManager.php';


function signUp($username = null, $email = null, $pass = null, $role = null)
{
    $userManager = new UserManager();
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $addUser = $userManager->signUp($username, $email, $pass, $role);
        var_dump($username, $email, $pass, $role);

        if ($addUser === false) {
            $_SESSION['error'] = 'Impossible d\'ajouter un article !';
        } else {
            $_SESSION['success'] = 'Votre article a été ajouté =)!';
        }
    }
    require('Views/UsersViews/signUpView.php');
}