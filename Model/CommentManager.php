<?php
namespace Blog\Model;

require_once ("model/Manager.php");

class CommentManager extends Manager
{

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comment.id, user.username, comment.comment, DATE_FORMAT(comment.created_at, \'%d/%m/%Y à %Hh%imin%ss\') AS created_comment_at_fr 
                                  FROM comment 
                                  LEFT JOIN user 
                                  ON comment.user_id_fk = user.id
                                  WHERE comment.deleted_at IS NULL && comment.post_id_fk = ? 
                                  ORDER BY comment.created_at DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getComment($getCommentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *
                            FROM comment 
                            WHERE deleted_at IS NULL && id = ?');
        $req->execute(array($getCommentId));
        $getComment = $req->fetch();

        return $getComment;
    }


    public function addComment($postId, $user, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(comment.post_id_fk, comment.user_id_fk, comment.comment, comment.created_at) VALUES(?, ?, ?, NOW())');

        $comments->bindParam(1,$postId, \PDO::PARAM_INT);
        $comments->bindParam(2,$user, \PDO::PARAM_INT);
        $comments->bindParam(3,$comment, \PDO::PARAM_STR);

        $affectedLines = $comments->execute(array($postId, $user, $comment));

        return $affectedLines;
    }

    public function updateComment($newComment, $commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comment 
                                          SET comment.comment = ?, comment.updated_at=NOW() 
                                          WHERE deleted_at IS NULL && comment.id=?');

        $comment->bindParam(1,$newComment, \PDO::PARAM_STR);
        $comment->bindParam(2,$commentId, \PDO::PARAM_INT);

        $upDatedComments = $comment->execute(array($newComment, $commentId));


        return $upDatedComments;
    }

    public function deleteComment($deleteCId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = ?');
        $delete = $req->execute(array($deleteCId));
    }

    public function deleteSoftComment($deleteCId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment 
                                      SET deleted_at = NOW() 
                                      WHERE id = ?');

        $deleteSoft = $req->execute(array($deleteCId));
    }

}
















