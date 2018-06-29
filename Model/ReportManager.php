<?php
namespace Blog\Model;

require_once ('Model/Manager.php');

/**
 * Class ReportManager
 * @package Blog\Model
 *
 * All queries related to report.
 */
class ReportManager extends Manager
{
    /**
     * Request to get the post a comment that has been deleted
     *
     * Use in AdminController.php: getModeration.
     * Use in CommentController.php: addComment, deleteSoftComment.
     * Use in PostController.php: post.
     * Use in ReportController.php: report.
     *
     * @param int $commentId
     * @return bool|\PDOStatement
     */
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

    /**
     *
     *
     * @param int $commentId
     * @param int $userId
     * @return bool|\PDOStatement::fetch
     */
    public function checkReport($commentId, $userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *
                                      FROM report_comment
                                      WHERE id_comment_pfk = :id_comment_pfk AND id_user_pfk = :id_user_pfk
                                      ');
        $req->bindParam(':id_comment_pfk', $commentId, \PDO::PARAM_INT);
        $req->bindParam(':id_user_pfk', $userId, \PDO::PARAM_INT);

        $req->execute();
        $checkReport = $req->fetch();
        return $checkReport;
    }

    /**
     * Request to report a comment,
     * based on its user id and its comment id.
     *
     * @param int $commentId
     * @param int $userId
     * @return bool|\PDOStatement
     */
    public function report($commentId, $userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO report_comment(id_user_pfk, id_comment_pfk, reported_at)
                                      VALUES (:id_user_pfk, :id_comment_pfk, NOW())');

        $req->bindParam(':id_comment_pfk',$commentId, \PDO::PARAM_INT);
        $req->bindParam(':id_user_pfk',$userId, \PDO::PARAM_INT);

        $affectedComment = $req->execute();

        return $affectedComment;
    }
}