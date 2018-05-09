<?php

use Blog\Model\PostManager;
use Blog\Model\CommentManager;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

/**
 *
 */
function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/homeView.php');
}

function addPostDisplay()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/addPostView.php');
}

function addPost($postTitle, $postContent, $userId, $categoryId)
{
    $postManager = new PostManager();

    $affectedPost = $postManager->postPost($postTitle, $postContent, $userId, $categoryId);

    if ($affectedPost === false) {
        die('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=addPostDisplay');
    }

}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addCommentDisplay()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/frontend/addCommentView.php');
}

function addComment($postId, $user, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $user, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=addCommentDisplay&id=' . $postId);
    }
}

function upDateCommentDisplay()
{
    $commentManager = new CommentManager();
    $commentManagerbis = new CommentManager();


    $data = $commentManager->getComment($_GET['id']);

    $comments = $commentManagerbis->getComments($_GET['id']);

    require('view/frontend/upDateCommentView.php');
}

function upDaComment($commentId,$newComment)
{
    $commentManager = new CommentManager();

    $upDatedComments = $commentManager->upDateComment($commentId,$newComment);

    if ($upDatedComments === false) {
        die('Impossible de modifier le commentaire !');
    } else {
        header('Location: index.php?action=upDateCommentDisplay&id=' . $commentId);
    }
}














