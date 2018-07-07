<?php
session_start();

require('Services/Authentication.php');
require ('Controller/CommentController.php');
require ('Controller/PostController.php');
require ('Controller/CategoryController.php');
require ('Controller/UserController.php');
require ('Controller/ReportController.php');
require ('Controller/AdminController.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            if(!empty($_GET['page']) AND $_GET['page'] > 0 ) {
                $page = intval($_GET['page']);
                getPosts($page);
            }
        } elseif ($_GET['action'] == 'listCategories') {
            listCategories();
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
        } elseif ($_GET['action'] == 'signUp') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                signUp($_POST['username'], $_POST['email'], $_POST['pass'], $_POST['role']);
            } else {
                signUp();
            }
        } elseif ($_GET['action'] == 'logIn') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                logIn($_POST['email']);
            } else {
                logIn();
            }
        } elseif ($_GET['action'] == 'logOut') {
            logOut();
        } elseif (Authentication::isLogged()) {
            if ($_GET['action'] == 'addComment') {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    addComment($_GET['id'], $_POST['user_id_fk'], $_POST['comment']);
                } elseif (isset($_GET['id']) && $_GET['id'] > 0) {
                    addComment($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            } elseif ($_GET['action'] == 'updateComment') {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    updateComment($_POST['comment'], $_GET['id']);
                } elseif (isset($_GET['id']) && $_GET['id'] > 0) {
                    updateComment(null, $_GET['id']);
                }
            } elseif ($_GET['action'] == 'deleteSoftComment') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    deleteSoftComment($_GET['id']);
                } else {
                    throw new Exception('Le Commentaire ne peut être supprimer');
                }
            } elseif ($_GET['action'] == 'profile') {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    profile($_GET['id'], $_POST['username'], $_POST['email']);
                } else {
                    profile($_GET['id']);
                }
            } elseif ($_GET['action'] == 'report') {
                if (isset($_GET['id_comment_pfk']) && $_GET['id_comment_pfk'] > 0) {
                    report($_GET['id_comment_pfk'], $_SESSION['user']['id']);
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            } elseif (Authentication::isAdmin()) {
                if ($_GET['action'] == 'addPost') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        addPost($_POST['title'], $_POST['content'], $_POST['user_id_fk'], $_POST['category_id_fk']);
                    } else {
                        addPost(null);
                    }
                } elseif ($_GET['action'] == 'updatePost'){
                    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                        updatePost($_GET['id'], $_POST['title'], $_POST['category_id_fk'], $_POST['content']);
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
                } elseif ($_GET['action'] == 'deleteComment') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        deleteComment($_GET['id']);
                    } else {
                        throw new Exception('Le Commentaire ne peut être supprimer');
                    }
                } elseif ($_GET['action'] == 'dashBoard') {
                    dashBoard();
                } elseif ($_GET['action'] == 'getModeration') {
                    if(!empty($_GET['page']) AND $_GET['page'] > 0 ) {
                        $page = intval($_GET['page']);
                        getModeration($page);
                    } else {
                        $currentPage = 1;
                        getModeration($currentPage);
                    }
                } elseif ($_GET['action'] == 'getAdminPost') {
                    if(!empty($_GET['page']) AND $_GET['page'] > 0 ) {
                        $page = intval($_GET['page']);
                        getAdminPost($page);
                    } else {
                        $currentPage = 1;
                        getAdminPost($currentPage);
                    }
                } elseif ($_GET['action'] == 'getAdminUser') {
                    if(!empty($_GET['page']) AND $_GET['page'] > 0 ) {
                        $page = intval($_GET['page']);
                        getAdminUser($page);
                    } else {
                        $currentPage = 1;
                        getAdminUser($currentPage);
                    }
                } elseif ($_GET['action'] == 'deleteUser') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        deleteUser($_GET['id']);
                    } else {
                        throw new Exception('L\'utilisateur ne peut être supprimer');
                    }
                } elseif ($_GET['action'] == 'deleteSoftUser') {
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        deleteSoftUser($_GET['id']);
                    } else {
                        throw new Exception('L\'utilisateur ne peut être supprimer');
                    }
                }
            }
        }
    } else {
        $currentPage = 1;
        getPosts($currentPage);
    }
} catch(Exception $e){
    $error =  'Il y a une erreur sur cette page : ' . $e->getMessage();
    require('Views/errorView.php');
}