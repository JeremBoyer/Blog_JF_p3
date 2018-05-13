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
    $postManager = new PostManager();


    $comment = $commentManager->getComment($_GET['id']);

    $post = $postManager->getPost($comment['post_id_fk']);


    require('view/frontend/upDateCommentView.php');
}

function updateComment($newComment,$commentId)
{
    $commentManager = new CommentManager();

    $upDatedComments = $commentManager->upDateComment($newComment,$commentId);

    if ($upDatedComments === false) {
        die('Impossible de modifier le commentaire !');
    } else {
        header('Location: index.php?action=upDateCommentDisplay&id=' . $commentId);
    }
}

function upDatePostDisplay($postID)
{
    $postManager = new PostManager();
    $post = $postManager->getPost($postID);


    require('view/frontend/upDatePostView.php');
}

function editPost($postId, $postTitle, $postContent)
{
    $postManager = new PostManager();

    $upDatedPost = $postManager->upDatePost($postId, $postTitle, $postContent);

    if ($upDatedPost === false) {
        die('Impossible de modifier l\'articles');
    } else {
        header('Location: index.php?action=upDatePostDisplay&id=' . $postId);
    }
}

function erasePost($deletePId)
{
    $postManager = new PostManager();
    $affectedPost = $postManager->deletePost($deletePId);

    if ($affectedPost === false) {
        die('Impossible de supprimer l\'articles');
    } else {
       echo 'Votre article a bien été supprimer';
    }
}

function eraseComment($deleteCId)
{
    $commentManager = new CommentManager();
    $affectedComment = $commentManager->deleteComment($deleteCId);

    if ($affectedComment === false) {
        die('Impossible de supprimer le commentaire');
    } else {
        echo 'Votre article a bien été supprimer';
    }
}













