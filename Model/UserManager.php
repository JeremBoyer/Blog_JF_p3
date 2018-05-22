<?php
namespace Blog\Model;

require_once 'Model/Manager.php';

class UserManager extends Manager
{


    public function signUp($username, $email, $pass, $role)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('INSERT INTO user(username, email, pass, role, register_at ) VALUES (:username, :pass, :email, :role, NOW())');

        $req->bindParam(':username',$username, \PDO::PARAM_STR);
        $req->bindParam(':email',$email, \PDO::PARAM_STR);
        $req->bindParam(':pass',$pass, \PDO::PARAM_STR);
        $req->bindParam(':role',$role, \PDO::PARAM_STR);

        $signUp = $req->execute();

        return $signUp;
    }

}