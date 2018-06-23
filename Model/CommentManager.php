<?php
namespace Blog\Model;

require_once ("Model/Manager.php");

class CommentManager extends Manager
{

    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * 
                                  FROM comment 
                                  LEFT JOIN user 
                                  ON comment.user_id_fk = user.id
                                  WHERE comment.deleted_at IS NULL && comment.post_id_fk = :id 
                                  ORDER BY comment.created_at DESC');

        $comments->bindParam(':id',$postId, \PDO::PARAM_INT);

        $comments->execute();

        return $comments;
    }

    public function getComment($getCommentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *
                            FROM comment 
                            WHERE deleted_at IS NULL && id = :id');

        $req->bindParam(':id',$getCommentId, \PDO::PARAM_INT);

        $req->execute();
        $getComment = $req->fetch();

        return $getComment;
    }


    public function addComment($postId, $user, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(comment.post_id_fk, comment.user_id_fk, comment.comment, comment.created_at) VALUES(:post_id_fk, :user_id_fk, :comment, NOW())');

        $comments->bindParam(':post_id_fk',$postId, \PDO::PARAM_INT);
        $comments->bindParam(':user_id_fk',$user, \PDO::PARAM_INT);
        $comments->bindParam(':comment',$comment, \PDO::PARAM_STR);

        $affectedLines = $comments->execute();

        return $affectedLines;
    }

    public function updateComment($newComment, $commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comment 
                                          SET comment.comment = :comment, comment.updated_at=NOW() 
                                          WHERE deleted_at IS NULL && comment.id = :id');

        $comment->bindParam(':comment',$newComment, \PDO::PARAM_STR);
        $comment->bindParam(':id',$commentId, \PDO::PARAM_INT);

        $upDatedComments = $comment->execute();


        return $upDatedComments;
    }

    public function deleteComment($deleteCId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = :id');

        $req->bindParam(':id',$deleteCId, \PDO::PARAM_INT);

        $delete = $req->execute();
    }

    public function deleteSoftComment($deleteCId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment 
                                      SET deleted_at = NOW() 
                                      WHERE id = :id');

        $req->bindParam(':id',$deleteCId, \PDO::PARAM_INT);

        $deleteSoft = $req->execute();
    }

    //Administration


}
















