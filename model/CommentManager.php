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
        $req = $db->prepare('SELECT comment.id, comment.comment, DATE_FORMAT(comment.created_at, \'%d/%m/%Y à %Hh%imin%ss\') AS created_getComment_at_fr 
                            FROM comment 
                            WHERE id = ?');
        $req->execute(array($getCommentId));
        $getComment = $req->fetch();

        return $getComment;
    }

    public function postComment($postId, $user, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(comment.post_id_fk, comment.user_id_fk, comment.comment, comment.created_at) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $user, $comment));

        return $affectedLines;
    }

    public function postAndComment($commentId){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT post.id, post.content, post.title, DATE_FORMAT(post.created_at, \'%d/%m/%Y à %Hh%imin%ss\') AS created_at_fr,
                              comment.id, comment.comment, DATE_FORMAT(comment.created_at, \'%d/%m/%Y à %Hh%imin%ss\') AS created_comment_at_fr 
                              FROM post 
                              LEFT JOIN comment 
                              ON post.id = comment.post_id_fk 
                              WHERE comment.id = ? 
                              ');
        $postAndComment = $req->execute(array($commentId));
        return $postAndComment;
    }

    public function upDateComment($commentId, $newComment)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comment SET comment.comment = ?, comment.updated_at=NOW() WHERE comment.id=?');
        $upDatedComments = $comment->execute(array($commentId, $newComment));


        return $upDatedComments;
    }

}
















