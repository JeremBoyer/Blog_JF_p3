<?php
namespace Blog\Model;

require_once ("Model/Manager.php");

/**
 * Class CommentManager
 * @package Blog\Model
 *
 * All queries related to comment.
 */
class CommentManager extends Manager
{

    /**
     * Request to get comments related to a post.
     *
     * @param int $postId
     * @return bool|\PDOStatement
     */
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT * 
                                  FROM comment 
                                  LEFT JOIN user 
                                  ON comment.user_id_fk = user.id
                                  WHERE comment.deleted_at IS NULL && comment.post_id_fk = :id && comment.user_id_fk = user.id
                                  ORDER BY comment.created_at DESC');

        $comments->bindParam(':id',$postId, \PDO::PARAM_INT);

        $comments->execute();

        return $comments;
    }

    /**
     * Request to get a comment with its id.
     *
     * @param int $getCommentId
     * @return null|array
     */
    public function getComment($getCommentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT *
                            FROM comment 
                            WHERE id = :id');

        $req->bindParam(':id',$getCommentId, \PDO::PARAM_INT);

        $req->execute();
        $getComment = $req->fetch();

        return $getComment;
    }

    /**
     * Request to insert a comment.
     *
     * @param int $postId
     * @param int $user
     * @param string $comment
     * @return bool
     */
    public function addComment($postId, $user, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comment(comment.post_id_fk, comment.user_id_fk, comment.comment, comment.created_at) VALUES(:post_id_fk, :user_id_fk, :comment, NOW())');

        $comments->bindParam(':post_id_fk',$postId, \PDO::PARAM_INT);
        $comments->bindParam(':user_id_fk',$user, \PDO::PARAM_INT);
        $comments->bindParam(':comment',$comment, \PDO::PARAM_STR);

        $addedComment = $comments->execute();

        return $addedComment;
    }

    /**
     * Request to update a comment, based on its id.
     *
     * @param string $newComment
     * @param int $commentId
     * @return bool
     */
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

    /**
     * Request to delete a comment, based on its id.
     *
     * @param int $deleteCId
     */
    public function deleteComment($deleteCId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comment WHERE id = :id');

        $req->bindParam(':id',$deleteCId, \PDO::PARAM_INT);

        $delete = $req->execute();
    }

    /**
     * Request to up the field deleted_at,
     * based on its id.
     *
     * @param int $deleteCId
     */
    public function deleteSoftComment($deleteCId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comment 
                                      SET deleted_at = NOW() 
                                      WHERE id = :id');

        $req->bindParam(':id',$deleteCId, \PDO::PARAM_INT);

        $deleteSoft = $req->execute();
    }
}
















