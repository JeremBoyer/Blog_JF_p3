<?php

use Blog\Model\PostManager;
use Blog\Model\CommentManager;

require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('Views/homeView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('Views/PostViews/postView.php');
}

function addPostDisplay()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('Views/PostViews/addPostView.php');
}

function addPost($postTitle, $postContent, $userId, $categoryId)
{
    $postManager = new PostManager();

    $affectedPost = $postManager->addPost($postTitle, $postContent, $userId, $categoryId);

    if ($affectedPost === false) {
        die('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=addPostDisplay');
    }
}

function upDatePostDisplay($postID)
{
    $postManager = new PostManager();
    $post = $postManager->getPost($postID);

    require('Views/PostViews/updatePostView.php');
}

function updatePost($postId, $postTitle, $postContent)
{
    $postManager = new PostManager();

    $upDatedPost = $postManager->updatePost($postId, $postTitle, $postContent);

    if ($upDatedPost === false) {
        die('Impossible de modifier l\'articles');
    } else {
        header('Location: index.php?action=updatePostDisplay&id=' . $postId);
    }
}

function deletePost($deletePId)
{
    $postManager = new PostManager();
    $affectedPost = $postManager->deletePost($deletePId);

    if ($affectedPost === false) {
        die('Impossible de supprimer l\'articles');
    } else {
        echo 'Votre article a bien été supprimer';
    }
}

function deleteSoftPost($deletePId)
{
    $postManager = new PostManager();
    $deletedPost = $postManager->deleteSoftPost($deletePId);

    if ($deletedPost === false) {
        die('Impossible de supprimer l\'articles');
    } else {
        echo 'Votre article a bien été supprimer';
    }
}