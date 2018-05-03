<?php

use Blog\Model\PostManager;

require_once('model/PostManager.php');

/**
 *
 */
function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/homeView.php');
}