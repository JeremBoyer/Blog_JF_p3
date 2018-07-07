<?php
namespace Blog\Model;


require_once("Model/Manager.php");

/**
 * Class PostManager
 * @package Blog\Model
 *
 * All queries related to articles.
 */
class PostManager extends Manager
{


    /**
     * Query to select six posts per $page.
     *
     * Query to select six posts per $page,
     * that have not been deleted,
     * in descending order date.
     *
     * @param int $page
     *
     * @return bool|\PDOStatement
     */
    public function getPosts($page)
    {
        $db = $this->dbConnect();

        $postPerPage = 6;
        $start = ($page-1)*$postPerPage;

        $req = $db->query('SELECT *
                                    FROM post 
                                    WHERE deleted_at IS NULL
                                    ORDER BY post.created_at 
                                    DESC LIMIT ' . $start  . ', ' . $postPerPage );
        $req->execute();
        return $req;
    }

    /**
     * Query to select all posts.
     *
     * Query to select all posts,
     * that have not been deleted,
     * in descending order date.
     *
     * @return bool|\PDOStatement,
     */
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

    /**
     * Request to get one post, based on its id,
     * that have not been deleted.
     *
     * @param int $postId
     * @return null|array
     */
    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *
                                      FROM post 
                                      INNER JOIN category
                                      ON post.category_id_fk = category.id 
                                      WHERE deleted_at IS NULL && post.id = :id');

        $req->bindParam(':id',$postId, \PDO::PARAM_INT);

        $req->execute();
        $post = $req->fetch();

        return $post;
    }

    /**
     * Request to insert a post.
     *
     * @param string $postTitle
     * @param string $postContent
     * @param int $userId
     * @param int $categoryId
     * @return bool
     */
    public function addPost($postTitle, $postContent, $userId, $categoryId)
    {

        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO post(post.title, post.content, post.user_id_fk, post.category_id_fk, post.created_at) 
                                      VALUES (:title, :content, :user_id_fk, :category_id_fk,NOW())');

        $req->bindParam(':title',$postTitle, \PDO::PARAM_STR);
        $req->bindParam(':content',$postContent, \PDO::PARAM_STR);
        $req->bindParam(':user_id_fk',$userId, \PDO::PARAM_INT);
        $req->bindParam(':category_id_fk',$categoryId, \PDO::PARAM_INT);

        $addedPost = $req->execute();
        return $addedPost;
    }

    /**
     * Request to update a post, based on its id,
     * that have not been deleted.
     *
     * @param int $postId
     * @param string $postTitle
     * @param int $categoryId
     * @param string $postContent
     * @return bool
     */
    public function updatePost($postId, $postTitle, $categoryId, $postContent)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post 
                                      SET title = :title, content = :content, category_id_fk = :category_id_fk, updated_at = NOW() 
                                      WHERE deleted_at IS NULL && id = :id');

        $req->bindParam(':title',$postTitle, \PDO::PARAM_STR);
        $req->bindParam(':content',$postContent, \PDO::PARAM_STR);
        $req->bindParam(':id',$postId, \PDO::PARAM_INT);
        $req->bindParam(':category_id_fk',$categoryId, \PDO::PARAM_INT);

        $upDatedPost = $req->execute();

        return $upDatedPost;
    }

    /**
     * Request to delete a post,
     * based on its id.
     *
     * @param int $deletePId
     */
    public function deletePost($deletePId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM post WHERE id = :id');

        $req->bindParam(':id',$deletePId, \PDO::PARAM_INT);

        $delete = $req->execute();
    }

    /**
     * Request to up the field deleted_at,
     * based on its id.
     *
     * @param int $deletePId
     */
    public function deleteSoftPost($deletePId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE post SET deleted_at = NOW() WHERE id = :id');

        $req->bindParam(':id',$deletePId, \PDO::PARAM_INT);

        $deleteSoft = $req->execute();
    }

}