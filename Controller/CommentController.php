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

function addComment($postId, $user, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->addComment($postId, $user, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=addCommentDisplay&id=' . $postId);
    }
}

function upDateCommentDisplay()
{
    $commentManager = new CommentManager();
    $postManager = new PostManager();

    $comment = $commentManager->getComment($_GET['id']);
    $post = $postManager->getPost($comment['post_id_fk']);

    require('Views/CommentViews/updateCommentView.php');
}

function updateComment($newComment,$commentId)
{
    $commentManager = new CommentManager();
    $upDatedComments = $commentManager->updateComment($newComment,$commentId);

    if ($upDatedComments === false) {
        die('Impossible de modifier le commentaire !');
    } else {
        header('Location: index.php?action=updateCommentDisplay&id=' . $commentId);
    }
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