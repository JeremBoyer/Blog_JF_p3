<?php
namespace Blog\Model;

require_once("Model/Manager.php");

/**
 * Class CategoryManager
 * @package Blog\Model
 */
class CategoryManager extends Manager
{

    /**
     * Request to get category related and their posts.
     *
     * @param int $categoryId
     * @return bool|\PDOStatement
     */
    public function getPostsCategory($categoryId)
    {
        $db = $this->dbConnect();

        $posts = $db->prepare('SELECT * , post.title AS postTitle
                                    FROM post 
                                    LEFT JOIN category
                                    ON post.category_id_fk = category.id
                                    WHERE post.deleted_at IS NULL && post.category_id_fk = ?
                                    ORDER BY post.created_at
                                    ');

        $posts->bindParam(1,$categoryId, \PDO::PARAM_INT);

        $posts->execute();

        return $posts;
    }

    /**
     * Request to get category.
     *
     * Use in CategoryController.php: listCategories.
     * Use in PostController.php: addPost, updatePost.
     *
     * @return bool|\PDOStatement
     */
    public function listCategory()
    {
        $db = $this->dbConnect();

        $category = $db->prepare('SELECT *
                                      FROM category');

        $category->execute();
        return $category;
    }

    /**
     * Request to get category
     * @return bool|\PDOStatement::fetch
     */
    public function getCategory()
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT *
                                      FROM category');

        $req->execute();
        $category = $req->fetch();
        return $category;
    }
}



