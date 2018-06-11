<?php
namespace Blog\Model;


require_once("Model/Manager.php");

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
    public function getPosts($currentPage)
    {
        $db = $this->dbConnect();

        $postPerPage = 6;
        $start = ($currentPage-1)*$postPerPage;

        $req = $db->query('SELECT *
                                    FROM post 
                                    WHERE deleted_at IS NULL
                                    ORDER BY created_at 
                                    DESC LIMIT ' . $start  . ', ' . $postPerPage );
        $req->execute();
        return $req;
    }

    public function listPost()
    {
        $db = $this->dbConnect();

        $req = $db->query('SELECT *
                                    FROM post 
                                    WHERE deleted_at IS NULL
                                    ORDER BY created_at 
                                    DESC');
        $req->execute();
        return $req;
    }


    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, category_id_fk, DATE_FORMAT(created_at, \'%d/%m/%Y à %Hh%imin%ss\') AS created_at_fr 
                                      FROM post 
                                      WHERE deleted_at IS NULL && id = :id');

        $req->bindParam(':id',$postId, \PDO::PARAM_INT);

        $req->execute();
        $post = $req->fetch();

        return $post;
    }


    public function addPost($postTitle, $postContent, $userId, $categoryId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post(post.title, post.content, post.user_id_fk, post.category_id_fk, post.created_at) VALUES (:title, :content, :user_id_fk, :category_id_fk,NOW())');

        $req->bindParam(':title',$postTitle, \PDO::PARAM_STR);
        $req->bindParam(':content',$postContent, \PDO::PARAM_STR);
        $req->bindParam(':user_id_fk',$userId, \PDO::PARAM_INT);
        $req->bindParam(':category_id_fk',$categoryId, \PDO::PARAM_INT);

        $affectedPost = $req->execute();

        return $affectedPost;
    }


    public function updatePost($postId, $postTitle, $postContent)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post 
                                      SET title = :title, content = :content, updated_at = NOW() 
                                      WHERE deleted_at IS NULL && id = :id');

        $req->bindParam(':title',$postTitle, \PDO::PARAM_STR);
        $req->bindParam(':content',$postContent, \PDO::PARAM_STR);
        $req->bindParam(':id',$postId, \PDO::PARAM_INT);

        $upDatedPost = $req->execute();

        return $upDatedPost;
    }

    public function deletePost($deletePId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post WHERE id = :id');

        $req->bindParam(':id',$deletePId, \PDO::PARAM_INT);

        $delete = $req->execute();
    }

    public function deleteSoftPost($deletePId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET deleted_at = NOW() WHERE id = :id');

        $req->bindParam(':id',$deletePId, \PDO::PARAM_INT);

        $deleteSoft = $req->execute();
    }


}