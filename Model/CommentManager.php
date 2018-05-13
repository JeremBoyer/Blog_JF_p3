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
                                  WHERE comment.post_id_fk = ? 
                                  ORDER BY comment.created_at DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getComment($getCommentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *
                            FROM comment 
                            WHERE id = ?');
        $req->execute(array($getCommentId));
        $getComment = $req->fetch();

        return $getComment;
    }


    public function addComment($postId, $user, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(comment.post_id_fk, comment.user_id_fk, comment.comment, comment.created_at) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $user, $comment));

        return $affectedLines;
    }

    public function updateComment($newComment, $commentId)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comment SET comment.comment = ?, comment.updated_at=NOW() WHERE comment.id=?');
        $upDatedComments = $comment->execute(array($newComment, $commentId));


        return $upDatedComments;
    }

    public function deleteComment($deleteCId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = ?');
        $delete = $req->execute(array($deleteCId));

    }

}
















