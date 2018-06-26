<?php

use Blog\Model\UserManager;
use Blog\Model\Validator;

require_once 'Services/Flash.php';
require_once 'Services/Validator.php';
require_once 'Model/UserManager.php';


function signUp($username = null, $email = null, $pass = null, $role = null)
{
    $userManager = new UserManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $validator = new Validator();
        $checkMail = $validator->checkMail();
        $checkUsername = $validator->checkUsername();
        $checkPass = $validator->checkPass();

        $flash = new Flash();
        if ($checkMail !== true) {
            $flash->setFlash($checkMail, 'danger');
        } elseif ($checkUsername !== true) {
            $flash->setFlash($checkUsername, 'danger');
        } elseif ($checkPass !== true) {
            $flash->setFlash($checkPass, 'danger');
        } elseif ($checkMail === true && $checkUsername === true && $checkPass === true) {
            $addUser = $userManager->signUp($username, $email, $pass, $role);
            if ($addUser === false) {
                $flash->setFlash('Impossible de vous inscrire :', 'danger');

            } else {
                $flash->setFlash('Votre profil a été crée =)', 'success');
                $userIdManager = new UserManager();
                $userId = $userIdManager->getUserId($_POST['username']);

                $_SESSION['user'] = [
                    'id'       => $userId['id'],
                    'username' => $_POST['username'],
                    'email'    => $_POST['email'],
                    'role'     => $_POST['role']
                ];
            }
        } else {
            $flash->setFlash('Erreur! Veuillez contacter l\'administrateur', 'danger');
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

        if ($user === false) {
            $flash->setFlash('Votre mail ne correspond pas !', 'danger');

        } elseif(password_verify($_POST['pass'], $user['pass']) === false) {
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

    header('Location: index.php?action=getAdminUser');
}

function deleteSoftUser($userId)
{
    $userManager = new UserManager();
    $deleteUser = $userManager->deleteSoftUser($userId);

    $flash = new Flash();

    header('Location: index.php?action=getAdminUser');
}