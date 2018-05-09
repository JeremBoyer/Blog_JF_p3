<?php
namespace Blog\Model;


require_once("model/Manager.php");

/**
 * Class PostManager
 * @package Blog\Model
 *
 * All queries related to articles
 */
class PostManager extends Manager
{
    /**
     * @return bool|\PDOStatement
     *
     * Query to select the last five posts
     */
    public function getPosts()
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT id, title, content, DATE_FORMAT(created_at, \'%d/%m/%Y à %Hh%imin%ss\') AS created_at_fr FROM post ORDER BY created_at DESC LIMIT 0, 5');
        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(created_at, \'%d/%m/%Y à %Hh%imin%ss\') AS created_at_fr FROM post WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function postPost($postTitle, $postContent, $userId, $categoryId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post(post.title, post.content, post.user_id_fk, post.category_id_fk, post.created_at) VALUES (?,?,?,?,NOW())');
        $affectedPost = $req->execute(array($postTitle, $postContent, $userId, $categoryId));

        return $affectedPost;
    }




}