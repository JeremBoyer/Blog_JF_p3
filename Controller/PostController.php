<?php

use Blog\Model\PostManager;
use Blog\Model\CommentManager;
use Blog\Model\CategoryManager;
use Blog\Model\Paging;
use Blog\Model\ReportManager;
use Blog\Model\UserManager;


require_once('Services/Flash.php');
require_once('Services/Paging.php');
require_once ('Services/Authentication.php');
require_once ('Model/ReportManager.php');
require_once('Model/PostManager.php');
require_once('Model/CommentManager.php');
require_once('Model/UserManager.php');
require_once('Model/CategoryManager.php');
require_once ('Model/ReportManager.php');

function getPosts($page)
{

    $postManager = new PostManager();
    $categoryManager = new CategoryManager();
    $pagingService = new Paging();
    $categories = $categoryManager->listCategory();

    $posts = $postManager->getPosts($page);

    $totalPages = $pagingService->getPaging();
    require('Views/homeView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $userManager = new UserManager();
    $reportManager = new ReportManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);


    require('Views/PostViews/postView.php');
}

function addPost($postTitle = null, $postContent = null, $userId = null, $categoryId = null)
{
    $postManager = new PostManager();
    $categoryManager = new CategoryManager();

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $affectedPost = $postManager->addPost($postTitle, $postContent, $userId, $categoryId);
        $flash = new Flash();

        if($affectedPost === false) {
            $flash->setFlash('Impossible d\'ajouter un article !', 'danger');
        } else {
            $flash->setFlash('Votre article a été ajouté =)!', 'success');
        }
    }
    $categories = $categoryManager->listCategory();
    $posts = $postManager->listPost();
    require('Views/PostViews/addPostView.php');
}

function updatePost($postId, $postTitle = null, $postContent = null)
{

    $postManager = new PostManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $upDatedPost = $postManager->updatePost($postId, $postTitle, $postContent);
        $flash = new Flash();

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
    $postManager->deletePost($deletePId);

    header('Location: index.php?action=getAdminPost');
}

function deleteSoftPost($deletePId)
{
    $postManager = new PostManager();
    $postManager->deleteSoftPost($deletePId);

    header('Location: index.php?action=getAdminPost');
}