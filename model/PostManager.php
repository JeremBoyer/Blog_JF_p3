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


}