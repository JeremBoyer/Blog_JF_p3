<?php

require ('Controller/CommentController.php');
require ('Controller/PostController.php');
require ('Controller/CategoryController.php');
require ('Controller/UserController.php');

try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'getPostsCategory') {
            if (isset($_GET['category_id_fk']) && $_GET['category_id_fk'] > 0) {
                getPostsCategory($_GET['category_id_fk']);
                var_dump($_GET['category_id_fk']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
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
        } elseif ($_GET['action'] == 'updatePostDisplay') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                updatePostDisplay($_GET['id']);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'updatePost'){
            if (isset($_GET['id']) && $_GET['id'] > 0 ){
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    updatePost($_GET['id'], $_POST['title'], $_POST['content']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis, donc le commentaire n\'est pas modifié !';
                }
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
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
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['user_id_fk']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['user_id_fk'], $_POST['comment']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        } elseif ($_GET['action'] == 'updateCommentDisplay'){
            if ((isset($_GET['id']) && $_GET['id'] > 0)) {
                updateCommentDisplay();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'updateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    updateComment($_POST['comment'], $_GET['id']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis, donc le commentaire n\'est pas modifié !';
                }
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
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
                if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['role'])) {
                    signUp($_POST['username'], $_POST['email'], $_POST['pass'], $_POST['role']);
                } else {
                    var_dump($_POST['username'], $_POST['email'], $_POST['pass'], $_POST['role']);
                    echo 'Erreur : tous les champs ne sont pas remplis !';
                }
            } else {
                signUp();
            }
        }
    } else {
        listPosts();
    }
} catch(Exception $e){
    echo 'Erreur :';
}