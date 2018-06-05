<?php

use Blog\Model\UserManager;

require_once 'Model/UserManager.php';


function signUp($username = null, $email = null, $pass = null, $role = null)
{
    $userManager = new UserManager();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $addUser = $userManager->signUp($username, $email, $pass, $role);

        if ($addUser === false) {
            $_SESSION['error'] = 'Impossible de créer vous inscrire!';
        } else {
            $_SESSION['success'] = 'Votre profil a été créé =)!';
        }
    }
    require('Views/UsersViews/signUpView.php');
}

function profile($userId, $username = null, $email = null, $pass = null)
{
    $userManager = new UserManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $addUser = $userManager->profile($userId, $username, $email, $pass);

        if ($addUser === false) {
            $_SESSION['error'] = 'Impossible d\'ajouter un article !';
        } else {
            $_SESSION['success'] = 'Vous avez modifié votre profil =)!';
        }
    }

    $user = $userManager->getUser($userId);
    require('Views/UsersViews/profileView.php');
}

function logIn($email = null, $pass = null)
{
    $userManager = new UserManager();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = $userManager->logIn($email, $pass);
        if ($user === false) {
            $_SESSION['error'] = 'Votre mot de passe ou votre mot de passe ne correspondent pas!';
        } else {
            session_start();
            $_SESSION['success'] = 'Vous êtes connecté =)!';
            $_SESSION['user'] = [
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email']
            ];

        }
    }

    require('Views/UsersViews/logInView.php');
}

function checkMail($email)
{
    $userManager = new UserManager();

    $checkMail = $userManager->checkMail($email);

    return $checkMail;

}