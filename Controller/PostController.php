<?php

use Blog\Model\PostManager;
use Blog\Model\CommentManager;
use Blog\Model\CategoryManager;
use Blog\Model\Paging;
use Blog\Model\ReportManager;
use Blog\Model\UserManager;
use Blog\Model\AdminManager;


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
    $pagingService = new Paging();
    $adminManager = new AdminManager();

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

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $flash = new Flash();
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['user_id_fk']) && !empty($_POST['category_id_fk'])) {
            $addedPost = $postManager->addPost($postTitle, $postContent, $userId, $categoryId);

            if ($addedPost === false) {
                $flash->setFlash('Impossible d\'ajouter un article !', 'danger');
            } else {
                $flash->setFlash('Votre article a été ajouté =)!', 'success');
            }
        } else {
            $flash->setFlash('Tous les champs ne sont pas remplis', 'danger');
        }

    }
    $categories = $categoryManager->listCategory();
    $posts = $postManager->listPost();

    require('Views/PostViews/addPostView.php');
}

function updatePost($postId, $postTitle = null, $categoryId = null, $postContent = null)
{

    $postManager = new PostManager();
    $categoryManager = new CategoryManager();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $flash = new Flash();
        if (!empty($_POST['title']) && !empty($_POST['content'])) {
            $upDatedPost = $postManager->updatePost($postId, $postTitle, $categoryId, $postContent);


            if ($upDatedPost === false) {
                $flash->setFlash('Impossible de modifier un article !', 'danger');
            } else {
                $flash->setFlash('Votre article a été modifié =)!', 'success');
            }
        } else {
            $flash->setFlash('Il faut remplir tous les champs', 'danger');
        }
    }
    $categories = $categoryManager->listCategory();
    $post = $postManager->getPost($postId);

    require('Views/PostViews/updatePostView.php');
}

function deletePost($deleteId)
{
    $postManager = new PostManager();
    $postManager->deletePost($deleteId);

    header('Location: index.php?action=getAdminPost');
}

function deleteSoftPost($deleteId)
{
    $postManager = new PostManager();
    $postManager->deleteSoftPost($deleteId);

    header('Location: index.php?action=getAdminPost');
}