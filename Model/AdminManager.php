<?php
namespace Blog\Model;

require_once ("Model/Manager.php");

class AdminManager extends Manager
{

    public function nbComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS nbComments
                                    FROM comment
                                    ');
        $req->execute();

        $nbComments = $req->fetch();

        return $nbComments;
    }

    public function nbPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS nbPosts
                                      FROM post');

        $req->execute();
        $nbPost = $req->fetch();
        return $nbPost;
    }

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

    public function nbUsers()
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT COUNT(*) AS nbUsers
                                       FROM user');

        $req->execute();
        $nbUsers = $req->fetch();
        return $nbUsers;
    }

    public function getModeration($currentPage)
    {
        $db = $this->dbConnect();
        $postPerPage = 10;
        $start = ($currentPage-1)*$postPerPage;
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

    public function getAdminUser()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * 
                                      FROM user 
                                      WHERE user.deleted_at IS NULL 
                                      ORDER BY user.register_at ');
        $req->execute();
        return $req;
    }

    public function nbComment($userId)
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

}