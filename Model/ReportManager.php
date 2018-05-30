<?php
namespace Blog\Model;

require_once ('Model/Manager.php');

class ReportManager extends Manager
{
    public function getPostReport($commentId)
    {
        $db =$this->dbConnect();
        $req = $db->prepare('SELECT post_id_fk 
                                      FROM comment
                                      LEFT JOIN report_comment
                                      ON  comment.id = report_comment.id_comment_pfk
                                      WHERE comment.id = :id
                                      ');

        $req->bindParam(':id', $commentId, \PDO::PARAM_INT);
        $req->execute();
        $postReport = $req->fetch();

        return $postReport;
    }

    public function report($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO report_comment(id_user_pfk, id_comment_pfk, reported_at)
                                      VALUES (1, :id_comment_pfk, NOW())');

        $req->bindParam(':id_comment_pfk',$commentId, \PDO::PARAM_INT);

        $affectedComment = $req->execute();

        return $affectedComment;
    }

    public function deleteReport($commentId)
    {
        $db = $this->dbConnect();
        //request is not complete
        $req = $db->prepare('DELETE FROM report_comment WHERE id_comment_pfk = :id_comment_pfk');

        $req->bindParam(':id_comment_pfk',$commentId, \PDO::PARAM_INT);

        $deleteReport = $req->execute();

        return $deleteReport;
    }

}