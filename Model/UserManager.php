<?php
namespace Blog\Model;

require_once 'Model/Manager.php';

class UserManager extends Manager
{

    public function getUser($userId)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM user WHERE id = :id');

        $req->bindParam(':id',$userId, \PDO::PARAM_INT);


        $req->execute();
        $user = $req->fetch();

        return $user;
    }

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

    public function updatePass($userId, $pass) {
        $db = $this->dbConnect();
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $req = $db->prepare('UPDATE user SET pass = :pass WHERE id = :id');

        $req->bindParam(':id',$userId, \PDO::PARAM_INT);
        $req->bindParam(':pass',$pass, \PDO::PARAM_STR);

        $upPass = $req->execute();

        return $upPass;
    }

    public function logIn($email)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM user WHERE email = :email');

        $req->bindParam(':email',$email, \PDO::PARAM_STR);

        $req->execute();
        $user = $req->fetch();


        return $user;
    }

    public function checkMail($email)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM user WHERE email = :email');

        $req->bindParam(':email',$email, \PDO::PARAM_STR);

        $req->execute();

        $checkuser = $req->rowCount();

        return $checkuser;
    }

    public function deleteUser($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM user WHERE id = :id');

        $req->bindParam(':id',$userId, \PDO::PARAM_INT);

        $delete = $req->execute();
    }

    public function deleteSoftUser($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE user SET deleted_at = NOW() WHERE id = :id');

        $req->bindParam(':id',$userId, \PDO::PARAM_INT);

        $delete = $req->execute();
    }

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
}