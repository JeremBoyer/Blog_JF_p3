<?php

require ('Controller/CommentController.php');
require ('Controller/PostController.php');
require ('Controller/CategoryController.php');
require ('Controller/UserController.php');
require ('Controller/ReportController.php');

try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'getPostsCategory') {
            if (isset($_GET['category_id_fk']) && $_GET['category_id_fk'] > 0) {
                getPostsCategory($_GET['category_id_fk']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'report') {
            if (isset($_GET['id_comment_pfk']) && $_GET['id_comment_pfk'] > 0) {
                report($_GET['id_comment_pfk']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addPost') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['user_id_fk']) && !empty($_POST['category_id_fk'])) {
                    addPost($_POST['title'], $_POST['content'], $_POST['user_id_fk'], $_POST['category_id_fk']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            } else {
                addPost();
            }
        } elseif ($_GET['action'] == 'updatePost'){
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    updatePost($_GET['id'], $_POST['title'], $_POST['content']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis, donc le post n\'est pas modifié !';
                }
            } elseif (isset($_GET['id']) && $_GET['id'] > 0 ) {
                updatePost($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif($_GET['action'] == 'deleteSoftPost'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletesoftPost($_GET['id']);
            } else {
                throw new Exception('Le billet ne peut être supprimer');
            }
        } elseif($_GET['action'] == 'deletePost'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deletePost($_GET['id']);
            } else {
                throw new Exception('Le billet ne peut être supprimer');
            }
        } elseif ($_GET['action'] == 'addCommentDisplay') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                addCommentDisplay();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST['user_id_fk']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['user_id_fk'], $_POST['comment']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            } elseif (isset($_GET['id']) && $_GET['id'] > 0) {
                addComment($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'updateCommentDisplay'){
            if ((isset($_GET['id']) && $_GET['id'] > 0)) {
                updateCommentDisplay();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'updateComment') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST['comment'])) {
                    updateComment($_POST['comment'], $_GET['id']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis, donc le commentaire n\'est pas modifié !';
                }
            } elseif (isset($_GET['id']) && $_GET['id'] > 0) {
                updateComment($_GET['id'], $comment['post_id_fk']);
            }
        } elseif ($_GET['action'] == 'deleteComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteComment($_GET['id']);
            } else {
                throw new Exception('Le Commentaire ne peut être supprimer');
            }
        } elseif ($_GET['action'] == 'deleteSoftComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                deleteSoftComment($_GET['id']);
            } else {
                throw new Exception('Le Commentaire ne peut être supprimer');
            }
        } elseif ($_GET['action'] == 'signUp') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = htmlspecialchars($_POST['username']);
                $mail = htmlspecialchars($_POST['email']);
                $mail2 = htmlspecialchars($_POST['confirmation_mail']);
                $pass = sha1($_POST['pass']);
                $pass2 = sha1($_POST['confirmation_pass']);
                if (!empty($_POST['username']) &&
                    !empty($_POST['email']) &&
                    !empty($_POST['pass']) &&
                    !empty($_POST['role'])) {
                    $usernameLength = strlen($username);
                    if($username <= 255) {
                        if($mail == $mail2) {
                            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                $checkMail = checkMail($mail);
                                if($checkMail == 0) {
                                    if ($pass == $pass2) {
                                        signUp($_POST['username'], $_POST['email'], $_POST['pass'], $_POST['role']);
                                    } else {
                                        $e = "Vos mots de passe ne correspondent pas";
                                    }
                                } else {
                                    $e = "Votre mot de passe est dejà utilisé";
                                }
                            } else {
                                $e = "Vos mots de passe ne correspondent pas";
                            }
                        } else {
                            $e = "Vos emails ne correspondent pas";
                        }
                    } else {
                        $e = "Votre pseudo est beaucoup trop long!";
                    }

                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            } else {
                signUp();
            }
        } elseif ($_GET['action'] == 'profile') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (!empty($_POST['username']) &&
                    !empty($_POST['email']) &&
                    !empty($_POST['pass'])) {
                    profile($_GET['id'], $_POST['username'], $_POST['email'], $_POST['pass']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            } else {
                profile($_GET['id']);
            }
        } elseif ($_GET['action'] == 'logIn') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                if (!empty($_POST['email']) &&
                    !empty($_POST['pass'])) {
                    $checkUser = logIn($_POST['email'], $_POST['pass']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            } else {
                logIn();
            }
        } elseif ($_GET['action'] == 'logOut') {
            logOut();
        }
    } else {
        listPosts();
    }
} catch(Exception $e){
    echo 'Erreur :' . $e;
}