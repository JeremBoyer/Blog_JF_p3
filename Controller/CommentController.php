<?php
use Blog\Model\PostManager;
use Blog\Model\CommentManager;
use Blog\Model\ReportManager;
use Blog\Model\UserManager;


require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once ('Model/ReportManager.php');
require_once ('Model/UserManager.php');

function addComment($postId = null, $user = null , $comment = null, $commentId = null, $userId = null)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $userManager = new UserManager();
    $post = $postManager->getPost($_GET['id']);
    $reportManager = new ReportManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $affectedLines = $commentManager->addComment($postId, $user, $comment);
        $flash = new Flash();

        if ($affectedLines === false) {
            $flash->setFlash('Impossible d\'ajouter votre commentaire', 'danger');
        } else {
            $flash->setFlash('Votre commentaire a été ajouté =)!', 'success');
        }
    }


    $comments = $commentManager->getComments($_GET['id']);

    require('Views/CommentViews/addCommentView.php');
}

function updateComment($newComment = null,$commentId)
{
    $commentManager = new CommentManager();
    $postManager = new PostManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $upDatedComments = $commentManager->updateComment($newComment,$commentId);
        $flash = new Flash();

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
    $flash = new Flash();

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
    $flash = new Flash();

    if ($deletedComment === false) {
        $flash->setFlash('Impossible de désactiver votre commentaire', 'danger');
    } else {
        $flash->setFlash('Votre commentaire a été désactivé =)!', 'success');
    }
}