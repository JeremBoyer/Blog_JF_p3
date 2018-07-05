<?php
use Blog\Model\PostManager;
use Blog\Model\CommentManager;
use Blog\Model\ReportManager;
use Blog\Model\UserManager;


require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once ('Model/ReportManager.php');
require_once ('Model/UserManager.php');
require_once ('Services/Authentication.php');

function addComment($postId = null, $user = null , $comment = null, $commentId = null, $userId = null)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $userManager = new UserManager();
    $reportManager = new ReportManager();

    $post = $postManager->getPost($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $flash = new Flash();
        if (!empty($_POST['user_id_fk']) && !empty($_POST['comment'])) {
            $addedComment = $commentManager->addComment($postId, $user, $comment);

            if ($addedComment === false) {
                $flash->setFlash('Impossible d\'ajouter votre commentaire', 'danger');
            } else {
                $flash->setFlash('Votre commentaire a été ajouté =)!', 'success');
            }
        } else {
            $flash->setFlash('Tous les champs ne sont pas remplis :@', 'danger');
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
        $flash = new Flash();
        if (!empty($_POST['comment'])) {
            $upDatedComments = $commentManager->updateComment($newComment,$commentId);

            if ($upDatedComments === false) {
                $flash->setFlash('Impossible de modifier votre commentaire', 'danger');
            } else {
                $flash->setFlash('Votre commentaire a été modifié =)!', 'success');
            }
        } else {
            $flash->setFlash('Le commentaire ne peut être vide!', 'danger');
        }
    }
    $commentToUp = $commentManager->getComment($_GET['id']);

    $post = $postManager->getPost($commentToUp['post_id_fk']);

    require('Views/CommentViews/updateCommentView.php');
}

function deleteComment($deleteId)
{
    $commentManager = new CommentManager();
    $affectedComment = $commentManager->deleteComment($deleteId);

    $flash = new Flash();


    header('Location: index.php?action=getModeration');
}

function deleteSoftComment($deleteId)
{
    $commentManager = new CommentManager();

    $deletedComment = $commentManager->deleteSoftComment($deleteId);

    $flash = new Flash();

    if (Authentication::isAdmin()) {
        header('Location: index.php?action=getModeration');
    } elseif (Authentication::isLogged()) {
        $postManager = new PostManager();
        $commentPManager = new CommentManager();
        $commentsManager = new CommentManager();
        $userManager = new UserManager();
        $reportManager = new ReportManager();

        $getPostId = $commentPManager->getComment($_GET['id']);
        $post = $postManager->getPost($getPostId['post_id_fk']);
        $comments = $commentsManager->getComments($getPostId['post_id_fk']);

        require('Views/PostViews/postView.php');
    }
}