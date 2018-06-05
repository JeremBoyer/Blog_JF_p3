<?php

use Blog\Model\PostManager;
use Blog\Model\CommentManager;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

function addCommentDisplay()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('Views/CommentViews/addCommentView.php');
}

function addComment($postId = null, $user = null , $comment = null)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $affectedLines = $commentManager->addComment($postId, $user, $comment);

        if ($affectedLines === false) {
            $_SESSION['error'] = 'Impossible d\'ajouter le commentaire !';
        } else {
            $_SESSION['success'] = 'Votre commentaire a été ajouté =)!';
        }
    }

    $comments = $commentManager->getComments($_GET['id']);
    require('Views/CommentViews/addCommentView.php');
}

function upDateCommentDisplay()
{
    $commentManager = new CommentManager();





    require('Views/CommentViews/updateCommentView.php');
}

function updateComment($newComment,$commentId)
{
    $commentManager = new CommentManager();
    $postManager = new PostManager();


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $upDatedComments = $commentManager->updateComment($newComment,$commentId);

        if ($upDatedComments === false) {
            $_SESSION['error'] = 'Impossible de modifier le commentaire !';
        } else {
            $_SESSION['success'] = 'Votre commentaire a été modifié =)!';
        }
    }
    $comment = $commentManager->getComment($_GET['id']);
    $post = $postManager->getPost($comment['post_id_fk']);
    require('Views/CommentViews/updateCommentView.php');
}

function deleteComment($deleteCId)
{
    $commentManager = new CommentManager();
    $affectedComment = $commentManager->deleteComment($deleteCId);

    if ($affectedComment === false) {
        die('Impossible de supprimer le commentaire');
    } else {
        echo 'Votre article a bien été supprimer';
    }
}

function deleteSoftComment($deleteCId)
{
    $commentManager = new CommentManager();
    $deletedComment = $commentManager->deleteSoftComment($deleteCId);

    if ($deletedComment === false) {
        die('Impossible de supprimer l\'articles');
    } else {
        echo 'Votre commentaire a bien été supprimer';
    }
}