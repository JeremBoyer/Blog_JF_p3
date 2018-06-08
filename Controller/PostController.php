<?php

use Blog\Model\PostManager;
use Blog\Model\CommentManager;
use Blog\Model\CategoryManager;
use \Blog\Model\Paging;

require('Services/FlashService.php');
require_once('Services/Paging.php');
require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once('Model/CategoryManager.php');
require_once ('Model/ReportManager.php');

function listPosts()
{
    $postManager = new PostManager();
    $categoryManager = new CategoryManager();
    $categories = $categoryManager->listCategory();
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

function addPost($postTitle = null, $postContent = null, $userId = null, $categoryId = null)
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $affectedPost = $postManager->addPost($postTitle, $postContent, $userId, $categoryId);
        $flash = new FlashService();

        if($affectedPost === false) {
            $flash->setFlash('Impossible d\'ajouter un article !', 'danger');
        } else {
            $flash->setFlash('Votre article a été ajouté =)!', 'success');
        }
    }
    require('Views/PostViews/addPostView.php');
}

function updatePost($postId, $postTitle = null, $postContent = null)
{
    $postManager = new PostManager();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $upDatedPost = $postManager->updatePost($postId, $postTitle, $postContent);
        $flash = new FlashService();

        if($upDatedPost === false) {
            $flash->setFlash('Impossible de modifier un article !', 'success');
        } else {
            $flash->setFlash('Votre article a été modifié =)!', 'success');
        }
    }
    $post = $postManager->getPost($postId);
    require('Views/PostViews/updatePostView.php');

}

function deletePost($deletePId)
{
    $postManager = new PostManager();
    $affectedPost = $postManager->deletePost($deletePId);
    $flash = new FlashService();

    if($affectedPost === false) {
        $flash->setFlash('Impossible de supprimer l\'article', 'danger');
    } else {
        $flash->setFlash('Votre article a bien été supprimé', 'success');
    }
}

function deleteSoftPost($deletePId)
{
    $postManager = new PostManager();
    $deletedPost = $postManager->deleteSoftPost($deletePId);
    $flash = new FlashService();

    if($deletedPost === false) {
        $flash->setFlash('Impossible de désactiver l\'article', 'danger');
    } else {
        $flash->setFlash('Votre article a bien été désactivé', 'success');
    }
}