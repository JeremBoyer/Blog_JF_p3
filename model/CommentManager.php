<?php
namespace Blog\Model;

require_once ("model/Manager.php");

class CommentManager extends Manager
{

    function getComments($postId)
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

}