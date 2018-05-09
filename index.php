<?php

require ('controller/frontend.php');

try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addPostDisplay'){
            addPostDisplay();
        } elseif ($_GET['action'] == 'addPost'){
            if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['user_id_fk']) && !empty($_POST['category_id_fk'])) {
                addPost($_POST['title'], $_POST['content'], $_POST['user_id_fk'], $_POST['category_id_fk']);
            } else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
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
        } elseif ($_GET['action'] == 'upDateCommentDisplay'){
            if ((isset($_GET['id']) && $_GET['id'] > 0)) {
                upDateCommentDisplay();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'upDaComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    upDaComment($_GET['id'], $_POST['comment']);
                } else {
                    echo 'Erreur : tous les champs ne sont pas remplis, donc le commentaire n\'est pas modifié !';
                }
            } else {
                echo 'Erreur : aucun identifiant de billet envoyé';
            }
        }
    } else {
        listPosts();
    }
} catch(Exception $e){
    echo 'Erreur :';
}