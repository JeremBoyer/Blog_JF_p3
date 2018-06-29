<?php
use Blog\Model\CategoryManager;

require_once('Model/CategoryManager.php');

function getPostsCategory($categoryId)
{
    $categoryManager = new CategoryManager();

    $posts = $categoryManager->getPostsCategory($categoryId);
    $isCategory = $categoryManager->getCategory();
    require('Views/CategoriesViews/postsCategoryView.php');
}

function listCategories()
{
    $categoryManager = new CategoryManager();
    $postsByCatManager = new CategoryManager();
    $categories =  $categoryManager->listCategory();
    require('Views/CategoriesViews/listCategoriesView.php');
}