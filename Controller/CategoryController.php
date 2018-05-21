<?php

use Blog\Model\CategoryManager;

require_once ('Model/CategoryManager.php');

function getPostsCategory($categoryId)
{
    $categoryManager = new CategoryManager();
    $posts = $categoryManager->getPostsCategory($categoryId);

    require('Views/PostViews/postCategoryView.php');
}