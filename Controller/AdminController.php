<?php
use Blog\Model\UserManager;
use Blog\Model\PostManager;
use Blog\Model\CategoryManager;
use Blog\Model\ReportManager;
use Blog\Model\AdminManager;
use Blog\Model\Paging;

/*
require_once ('Services/Authentication.php');

require_once ('Model/ReportManager.php');*/

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
    $reportManager = new ReportManager();
    $reportAdmin = new AdminManager();
    $nbReportManager = new AdminManager();
    $pagingService = new Paging();


    $comments = $adminManager->getModeration($page);
    $totalPages = $pagingService->getCommentPaging();

    require ('Views/AdminViews/moderatorView.php');
}

function getAdminUser($page)
{
    $adminManager = new AdminManager();
    $nbCommentManager = new AdminManager();
    $nbUserReportManager = new AdminManager();
    $pagingService = new Paging();

    $users = $adminManager->getAdminUser($page);
    $totalPages = $pagingService->getUserPaging();

    require ('Views/AdminViews/adminUserView.php');
}

function getAdminPost($page)
{
    $postManager = new PostManager();
    $nbCommentManager = new AdminManager();
    $categoryManager = new AdminManager();
    $pagingService = new Paging();
    $totalPages = $pagingService->getPaging();
    $posts = $postManager->getPosts($page);

    require ('Views/AdminViews/adminPostView.php');
}