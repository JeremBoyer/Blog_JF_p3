<?php
namespace Blog\Model;

require_once 'Model/Manager.php';

/**
 * Class UserManager
 * @package Blog\Model
 *
 * All queries related to user
 */
class UserManager extends Manager
{
    /**
     * Request to get user, based on his id.
     *
     * @param int $userId
     * @return bool|\PDOStatement::fetch
     */
    public function getUser($userId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM user WHERE id = :id');

        $req->bindParam(':id',$userId, \PDO::PARAM_INT);

        $req->execute();
        $user = $req->fetch();

        return $user;
    }

    /**
     * Request to sign up a user.
     *
     * @param string $username
     * @param string $email
     * @param string $pass
     * @param string $role
     * @return bool
     */
    public function signUp($username, $email, $pass, $role)
    {
        $db = $this->dbConnect();
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $req = $db->prepare('INSERT INTO user(username, email, pass, role, register_at ) VALUES (:username, :email, :pass, :role, NOW())');

        $req->bindParam(':username',$username, \PDO::PARAM_STR);
        $req->bindParam(':email',$email, \PDO::PARAM_STR);
        $req->bindParam(':pass',$pass, \PDO::PARAM_STR);
        $req->bindParam(':role',$role, \PDO::PARAM_STR);

        $signUp = $req->execute();

        return $signUp;
    }

    /**
     * Request to update a user.
     *
     * @param int $userId
     * @param string $username
     * @param string $email
     * @return bool
     */
    public function profile($userId, $username, $email)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE user SET username = :username, email = :email WHERE id = :id');


        $req->bindParam(':id',$userId, \PDO::PARAM_INT);
        $req->bindParam(':username',$username, \PDO::PARAM_STR);
        $req->bindParam(':email',$email, \PDO::PARAM_STR);

        $profile = $req->execute();

        return $profile;
    }

    /**
     * Request to update password
     *
     * @param int $userId
     * @param string$pass
     * @return bool
     */
    public function updatePass($userId, $pass) {
        $db = $this->dbConnect();
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $req = $db->prepare('UPDATE user SET pass = :pass WHERE id = :id');

        $req->bindParam(':id',$userId, \PDO::PARAM_INT);
        $req->bindParam(':pass',$pass, \PDO::PARAM_STR);

        $upPass = $req->execute();

        return $upPass;
    }

    /**
     * Request to select a user with his email
     *
     * @param string $email
     * @return mixed
     */
    public function logIn($email)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM user WHERE email = :email');

        $req->bindParam(':email',$email, \PDO::PARAM_STR);

        $req->execute();
        $user = $req->fetch();


        return $user;
    }

    /**
     * Request to delete a user with his id
     *
     * @param int $userId
     */
    public function deleteUser($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM user WHERE id = :id');

        $req->bindParam(':id',$userId, \PDO::PARAM_INT);

        $delete = $req->execute();
    }

    /**
     * Request to up the field deleted_at,
     * based on its id.
     *
     * @param int $userId
     */
    public function deleteSoftUser($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE user SET deleted_at = NOW() WHERE id = :id');

        $req->bindParam(':id',$userId, \PDO::PARAM_INT);

        $delete = $req->execute();
    }

    /**
     * Request to get a user.
     *
     * @param string $email
     * @param string $username
     * @param string $role
     * @param int $commentId
     * @param int $userId
     * @return bool|\PDOStatement::fetch
     */
    public function checkUser($email, $username, $role, $commentId, $userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * 
                                      FROM user 
                                      LEFT JOIN comment
                                      ON comment.user_id_fk = user.id
                                      WHERE user.email = :email AND user.username = :username AND user.role = :role AND comment.id = :id AND user.id = :userId');

        $req->bindParam(':email',$email, \PDO::PARAM_STR);
        $req->bindParam(':username',$username, \PDO::PARAM_STR);
        $req->bindParam(':role',$role, \PDO::PARAM_STR);
        $req->bindParam(':id',$commentId, \PDO::PARAM_INT);
        $req->bindParam(':userId',$userId, \PDO::PARAM_INT);

        $req->execute();
        $user = $req->fetch();

        return $user;
    }

    /**
     * Request to get user id, based on his username.
     *
     * @param string $username
     * @return bool|\PDOStatement
     */
    public function getUserId($username)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id FROM user WHERE username = :username');

        $req->bindParam(':username',$username, \PDO::PARAM_STR);

        $req->execute();

        $userId = $req->fetch();
        return $userId;
    }
}