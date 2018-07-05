<?php
use Blog\Model\UserManager;
use Blog\Model\PostManager;
use Blog\Model\CategoryManager;
use Blog\Model\ReportManager;
use Blog\Model\AdminManager;
use Blog\Model\Paging;

require_once('Model/CategoryManager.php');
require_once('Services/Flash.php');
require_once('Services/Paging.php');
require_once ('Model/AdminManager.php');
require_once ('Model/ReportManager.php');
require_once('Model/CommentManager.php');
require_once('Model/PostManager.php');
require_once ('Model/UserManager.php');

function dashBoard()
{
    $userAdminManager = new AdminManager();
    $postAdminManager = new AdminManager();
    $commentAdminManager = new AdminManager();
    $reportAdminManager =  new AdminManager();

    $nbPosts = $postAdminManager->nbPosts();

    $nbComments = $commentAdminManager->nbComments();

    $nbUsers = $userAdminManager->nbUsers();

    $nbReported = $reportAdminManager->nbReported();

    require ('Views/AdminViews/dashBoardView.php');
}

function getModeration($page)
{
    $adminManager = new AdminManager();
    $pagingService = new Paging();
    $reportManager = new ReportManager();
    $reportAdmin = new AdminManager();
    $nbReportManager = new AdminManager();

    $comments = $adminManager->getModeration($page);
    $totalPages = $pagingService->getCommentPaging();

    require ('Views/AdminViews/moderatorView.php');
}

function getAdminUser($page)
{
    $adminManager = new AdminManager();
    $pagingService = new Paging();
    $nbCommentManager = new AdminManager();
    $nbUserReportManager = new AdminManager();

    $users = $adminManager->getAdminUser($page);
    $totalPages = $pagingService->getUserPaging();

    require ('Views/AdminViews/adminUserView.php');
}

function getAdminPost($page)
{
    $postManager = new PostManager();
    $pagingService = new Paging();
    $nbCommentManager = new AdminManager();
    $categoryManager = new AdminManager();


    $totalPages = $pagingService->getPaging();
    $posts = $postManager->getPosts($page);

    require ('Views/AdminViews/adminPostView.php');
}