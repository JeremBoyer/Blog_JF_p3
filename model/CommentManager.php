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
                                  WHERE post_id_fk = ? 
                                  ORDER BY created_at DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function getComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, comment, DATE_FORMAT(created_at, \'%d/%m/%Y à %Hh%imin%ss\') AS created_at_fr FROM comment WHERE id = ?');
        $req->execute(array($commentId));
        $comment = $req->fetch();

        return $comment;
    }

    public function postComment($postId, $user, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(comment.post_id_fk, comment.user_id_fk, comment.comment, comment.created_at) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $user, $comment));

        return $affectedLines;
    }

    public function upDateComment($commentId, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comment SET comment.comment=? , comment.updated_at=NOW() WHERE comment.id=?');
        $affectedComments = $comments->execute(array($commentId, $comment));

        return $affectedComments;
    }

}