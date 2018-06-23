<?php

use Blog\Model\UserManager;

require_once 'Services/Flash.php';
require_once 'Model/UserManager.php';


function signUp($username = null, $email = null, $pass = null, $role = null)
{
    $userManager = new UserManager();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $addUser = $userManager->signUp($username, $email, $pass, $role);

        $session = new Flash();
        if ($addUser === false) {
            $session->setFlash('Impossible de vous inscrire :', 'danger');

        } else {
            $session->setFlash('Votre profil a été crée =)', 'success');
        }
    }
    require('Views/UsersViews/signUpView.php');
}

function profile($userId, $username = null, $email = null, $pass = null)
{
    $userManager = new UserManager();
    $passManager = new UserManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $userCheckManager = new UserManager();

        $userCheck = $userCheckManager->getUser($userId);
        if (!empty($_POST['pass'])) {
            $upPass = $passManager->updatePass($userId, $pass);
        } else {
            $checkUpPass = true;
        }

        if ($_POST['username'] == $userCheck['username'] || $_POST['email'] == $userCheck['email']) {
            $upUser = $userManager->profile($userId, $username, $email);
        }
        $flash = new Flash();

        if (!empty($checkUpPass) && ($_POST['username'] == $userCheck['username'] && $_POST['email'] == $userCheck['email'])) {
            $flash->setFlash('Pour modifier votre profil, veuillez modifier les informations...', 'danger');
        } elseif (!empty($upPass) === true && ($_POST['username'] == $userCheck['username'] && $_POST['email'] == $userCheck['email'])) {
            $flash->setFlash('Vous avez modifié votre mot de passe =)!', 'success');
        } elseif ($upUser === true) {
            $flash->setFlash('Vous avez modifié votre profil =)!', 'success');
        }
    }
    $user = $userManager->getUser($userId);
    require('Views/UsersViews/profileView.php');
}

function logIn($email = null)
{
    $userManager = new UserManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $user = $userManager->logIn($email);
        $flash = new Flash();

        $isPasswordCorrect = password_verify($_POST['pass'], $user['pass']);
        if ($user === false) {
            $flash->setFlash('Votre mail ne correspond pas !', 'danger');

        } elseif($isPasswordCorrect === false) {
            $flash->setFlash('Votre mot de passe n\'est pas valide!', 'danger');

        } else {
            $flash->setFlash('Vous êtes connecté =)!', 'success');

            $_SESSION['user'] = [
                'id'       => $user['id'],
                'username' => $user['username'],
                'email'    => $user['email'],
                'role'     => $user['role']
            ];

            header('Location: index.php');
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
    $flash = new Flash();

    unset($_SESSION['user']);

    $flash->setFlash('Vous êtes deconnecté avec succès =)!', 'success');

    require('Views/UsersViews/logInView.php');
}

function deleteUser($userId)
{
    $userManager = new UserManager();
    $deleteUser = $userManager->deleteUser($userId);

    $flash = new Flash();

    if($deleteUser === false) {
        $flash->setFlash('Impossible de supprimer l\'utilisateur', 'danger');
    } else {
        $flash->setFlash('L\'utilisateur a bien été supprimé', 'success');
    }
}

function deleteSoftUser($userId)
{
    $userManager = new UserManager();
    $deleteUser = $userManager->deleteSoftUser($userId);

    $flash = new Flash();

    if($deleteUser === false) {
        $flash->setFlash('Impossible de désactiver l\'utilisateur', 'danger');
    } else {
        $flash->setFlash('L\'utilisateur a bien été désactivé', 'success');
    }
}