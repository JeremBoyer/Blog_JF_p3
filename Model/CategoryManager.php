<?php
namespace Blog\Model;


require_once("Model/Manager.php");

class CategoryManager extends Manager
{

    public function getPostsCategory($categoryId)
    {
        $db = $this->dbConnect();

        $posts = $db->prepare('SELECT * , post.title AS postTitle
                                    FROM post 
                                    LEFT JOIN category
                                    ON post.category_id_fk = category.id
                                    WHERE post.deleted_at IS NULL && post.category_id_fk = ?
                                    ORDER BY post.created_at 
                                    DESC LIMIT 0, 6');

        $posts->bindParam(1,$categoryId, \PDO::PARAM_INT);

        $posts->execute();

        return $posts;
    }

    public function listCategory()
    {
        $db = $this->dbConnect();

        $cats = $db->prepare('SELECT *
                                      FROM category');

        $cats->execute();
        return $cats;
    }

}



