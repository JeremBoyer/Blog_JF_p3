<?php
namespace Blog\Model;
/**
 * Class Manager
 * @package Blog\Model
 *
 * Provides access to database for all model classes
 */
class Manager{

    /**
     * @return \PDO
     */
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=db_blog;charset=utf8', 'root', '');
        return $db;
    }
}