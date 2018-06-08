<?php
use Blog\Model\PostManager;
use Blog\Model\CommentManager;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

function addComment($postId = null, $user = null , $comment = null)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $affectedLines = $commentManager->addComment($postId, $user, $comment);
        $flash = new FlashService();

        if ($affectedLines === false) {
            $flash->setFlash('Impossible d\'ajouter votre commentaire', 'danger');
        } else {
            $flash->setFlash('Votre commentaire a été ajouté =)!', 'success');
        }
    }
    $comments = $commentManager->getComments($_GET['id']);
    require('Views/CommentViews/addCommentView.php');
}

function updateComment($newComment,$commentId)
{
    $commentManager = new CommentManager();
    $postManager = new PostManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $upDatedComments = $commentManager->updateComment($newComment,$commentId);
        $flash = new FlashService();

        if ($upDatedComments === false) {
            $flash->setFlash('Impossible de modifier votre commentaire', 'danger');
        } else {
            $flash->setFlash('Votre commentaire a été modifié =)!', 'success');
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
    $flash = new FlashService();

    if ($affectedComment === false) {
        $flash->setFlash('Impossible de supprimer votre commentaire', 'danger');
    } else {
        $flash->setFlash('Votre commentaire a été supprimé =)!', 'success');
    }
}

function deleteSoftComment($deleteCId)
{
    $commentManager = new CommentManager();
    $deletedComment = $commentManager->deleteSoftComment($deleteCId);
    $flash = new FlashService();

    if ($deletedComment === false) {
        $flash->setFlash('Impossible de désactiver votre commentaire', 'danger');
    } else {
        $flash->setFlash('Votre commentaire a été désactivé =)!', 'success');
    }
}