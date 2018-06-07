<?php

use Blog\Model\UserManager;

require 'Services/FlashService.php';
require_once 'Model/UserManager.php';


function signUp($username = null, $email = null, $pass = null, $role = null)
{
    $userManager = new UserManager();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $addUser = $userManager->signUp($username, $email, $pass, $role);

        $session = new FlashService();
        if ($addUser === false) {
            $session->setFlash('Impossible de vous inscrire :', 'danger');

        } else {
            $session->setFlash('Votre profil a été crée =) !', 'success');
        }
    }
    require('Views/UsersViews/signUpView.php');
}

function profile($userId, $username = null, $email = null, $pass = null)
{
    $userManager = new UserManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $addUser = $userManager->profile($userId, $username, $email, $pass);

        $session = new FlashService();
        if ($addUser === false) {
            $session->setFlash('Impossible de vous inscrire :', 'danger');

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
        $flash = new FlashService();

        if ($user === false) {
            $flash->setFlash('Votre mot de passe ou votre mot de passe ne correspondent pas!', 'danger');

        } else {
            $flash->setFlash('Vous êtes connecté =)!', 'success');

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

function logOut()
{
    $flash = new FlashService();

    unset($_SESSION['user']);

    $flash->setFlash('Vous êtes deconnecté avec succès =)!', 'success');

    require('Views/UsersViews/logInView.php');
}