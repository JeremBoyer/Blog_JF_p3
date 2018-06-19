<?php
use Blog\Model\UserManager;
use Blog\Model\PostManager;
use Blog\Model\CommentManager;
use Blog\Model\ReportManager;

/*require_once('Services/Flash.php');
require_once('Services/Paging.php');
require_once ('Services/Authentication.php');

require_once('Model/CategoryManager.php');
require_once ('Model/ReportManager.php');*/

require_once ('Model/ReportManager.php');
require_once('Model/CommentManager.php');
require_once('Model/PostManager.php');
require_once ('Model/UserManager.php');

function dashBoard()
{
    $userManager = new UserManager();
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $reportManager =  new Blog\Model\ReportManager();

    $nbPosts = $postManager->nbPosts();

    $nbComments = $commentManager->nbComments();

    $nbUsers = $userManager->nbUsers();

    $nbReported = $reportManager->nbReported();
    require ('Views/AdminViews/DashBoardViews.php');
}