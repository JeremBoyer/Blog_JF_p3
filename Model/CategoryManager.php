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
                                    ');

        $posts->bindParam(1,$categoryId, \PDO::PARAM_INT);

        $posts->execute();

        return $posts;
    }

    public function listCategory()
    {
        $db = $this->dbConnect();

        $category = $db->prepare('SELECT *
                                      FROM category');

        $category->execute();
        return $category;
    }

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



