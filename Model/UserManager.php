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

        $req = $db->prepare('INSERT INTO user(username, email, pass, role, register_at ) VALUES (:username, :email, :pass, :role, NOW())');

        $req->bindParam(':username',$username, \PDO::PARAM_STR);
        $req->bindParam(':email',$email, \PDO::PARAM_STR);
        $req->bindParam(':pass',$pass, \PDO::PARAM_STR);
        $req->bindParam(':role',$role, \PDO::PARAM_STR);

        $signUp = $req->execute();

        return $signUp;
    }

    public function profile($userId, $username, $email, $pass)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('UPDATE user SET username = :username, email = :email, pass = :pass WHERE id = :id');


        $req->bindParam(':id',$userId, \PDO::PARAM_INT);
        $req->bindParam(':username',$username, \PDO::PARAM_STR);
        $req->bindParam(':email',$email, \PDO::PARAM_STR);
        $req->bindParam(':pass',$pass, \PDO::PARAM_STR);

        $profile = $req->execute();

        return $profile;
    }

    public function logIn($email, $pass)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT * FROM user WHERE email = :email AND pass = :pass');

        $req->bindParam(':email',$email, \PDO::PARAM_STR);
        $req->bindParam(':pass',$pass, \PDO::PARAM_STR);

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
}