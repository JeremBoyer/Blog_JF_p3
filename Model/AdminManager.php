<?php
namespace Blog\Model;

require_once ("Model/Manager.php");

/**
 * Class AdminManager
 * @package Blog\Model
 *
 * All queries related to Administration
 */
class AdminManager extends Manager
{

    /**
     * Query to count comments
     * @return bool|\PDOStatement::fetch
     */
    public function nbComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS nbComments
                                    FROM comment
                                    WHERE comment.deleted_at IS NULL
                                    ');
        $req->execute();

        $nbComments = $req->fetch();

        return $nbComments;
    }

    /**
     * Query to count posts
     * @return bool|\PDOStatement::fetch
     */
    public function nbPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS nbPosts
                                      FROM post
                                      WHERE post.deleted_at IS NULL');

        $req->execute();
        $nbPost = $req->fetch();
        return $nbPost;
    }

    /**
     * Query to count reported comments
     * @return bool|\PDOStatement::fetch
     */
    public function nbReported()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(DISTINCT id_comment_pfk) AS nbReported
                                    FROM report_comment
                                    ');
        $req->execute();

        $nbComments = $req->fetch();

        return $nbComments;
    }

    /**
     * Query to select users
     *
     * @return bool|\PDOStatement::fetch
     */
    public function nbUsers()
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT COUNT(*) AS nbUsers
                                       FROM user
                                       WHERE user.deleted_at IS NULL');

        $req->execute();
        $nbUsers = $req->fetch();
        return $nbUsers;
    }

    /**
     * Request to get comment with paging
     *
     * @param int $page
     * @return bool|\PDOStatement
     */
    public function getModeration($page)
    {
        $db = $this->dbConnect();
        $postPerPage = 10;
        $start = ($page-1)*$postPerPage;
        $req = $db->prepare('SELECT * 
                                      FROM comment 
                                      INNER JOIN post ON comment.post_id_fk = post.id 
                                      INNER JOIN user ON comment.user_id_fk = user.id 
                                      WHERE comment.deleted_at IS NULL 
                                      ORDER BY comment.created_at 
                                      DESC LIMIT ' . $start  . ', ' . $postPerPage
                                      );


        $req->execute();
        return $req;
    }

    /**
     * Request to select reported comments, based on their id
     *
     * @param int $commentId
     * @return bool|\PDOStatement::fetch
     */
    public function checkReportAlert($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *
                                      FROM report_comment
                                      WHERE id_comment_pfk = :id_comment_pfk 
                                      ');
        $req->bindParam(':id_comment_pfk', $commentId, \PDO::PARAM_INT);

        $req->execute();
        $checkReport = $req->fetch();
        return $checkReport;
    }

    /**
     * Request to count how many times a comment has been reported.
     *
     * @param int $commentId
     * @return bool|\PDOStatement::fetch
     */
    public function nbReport($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT COUNT(id_comment_pfk)
                                    FROM report_comment
                                    WHERE id_comment_pfk = :id_comment_pfk
                                    ');
        $req->bindParam(':id_comment_pfk', $commentId, \PDO::PARAM_INT);

        $req->execute();

        $nbComments = $req->fetch();

        return $nbComments;
    }

    /**
     * Request to get users with paging.
     *
     * @param int $page
     * @return bool|\PDOStatement
     */
    public function getAdminUser($page)
    {
        $db = $this->dbConnect();
        $userPerPage = 10;
        $start = ($page-1)*$userPerPage;
        $req = $db->prepare('SELECT * 
                                      FROM user 
                                      WHERE user.deleted_at IS NULL 
                                      ORDER BY user.register_at 
                                      DESC LIMIT ' . $start  . ', ' . $userPerPage
                                      );
        $req->execute();
        return $req;
    }

    /**
     * Request to count how many times a comment has been reported by a user.
     *
     * @param int $userId
     * @return mixed
     */
    public function nbCommentPerUser($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT COUNT(id_comment_pfk)
                                    FROM report_comment
                                    WHERE id_user_pfk = :id_user_pfk
                                    ');
        $req->bindParam(':id_user_pfk', $userId, \PDO::PARAM_INT);

        $req->execute();

        $nbComments = $req->fetch();

        return $nbComments;
    }

    /**
     * @param int $userId
     * @return bool|\PDOStatement::fetch
     */
    public function nbUserReport($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT COUNT(*)
                                    FROM report_comment
                                    WHERE id_user_pfk = :id_user_pfk
                                    ');
        $req->bindParam(':id_user_pfk', $userId, \PDO::PARAM_INT);

        $req->execute();

        $nbComments = $req->fetch();

        return $nbComments;
    }

    /**
     * Request to count how many comments per post
     *
     * @param int $postId
     * @return bool|\PDOStatement::fetch
     */
    public function nbCommentPerPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT COUNT(id)
                                    FROM comment
                                    WHERE post_id_fk = :post_id_fk AND comment.deleted_at IS NULL
                                    ');
        $req->bindParam(':post_id_fk', $postId, \PDO::PARAM_INT);

        $req->execute();

        $nbComments = $req->fetch();

        return $nbComments;
    }

    /**
     * Request to get category with its id.
     *
     * @param int $categoryId
     * @return bool|\PDOStatement::fetch
     */
    public function getCategory($categoryId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *
                                      FROM category
                                      WHERE id = :id');

        $req->bindParam(':id', $categoryId, \PDO::PARAM_INT);
        $req->execute();
        $category = $req->fetch();
        return $category;
    }

}