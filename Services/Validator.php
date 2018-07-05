<?php
namespace Blog\Model;

/**
 * Class Validator
 * @package Blog\Model
 *
 * Queries and function to validate a user who register.
 */
class Validator extends Manager
{
    /**
     * Query to check if email exist in bdd.
     *
     * @param $email
     * @return int
     */
    private function isMail($email)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT email FROM user WHERE email = :email');

        $req->bindParam(':email',$email, \PDO::PARAM_STR);

        $req->execute();

        $checkMail = $req->rowCount();

        return $checkMail;
    }

    /**
     * Query to check if username exist in bdd.
     *
     * @param $username
     * @return int
     */
    private function isPseudo($username)
    {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT username FROM user WHERE username = :username');

        $req->bindParam(':username',$username, \PDO::PARAM_STR);

        $req->execute();

        $checkPseudo = $req->rowCount();

        return $checkPseudo;
    }

    /**
     * All verification for mail, and its errors messages.
     *
     * @return bool|string
     */
    public function checkMail()
    {
        $mail = htmlspecialchars($_POST['email']);
        $mail2 = htmlspecialchars($_POST['confirmation_mail']);
        if (!empty($_POST['email']) &&
            !empty($_POST['confirmation_mail'])) {
            if ($mail == $mail2) {
                if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                    $isMail = $this->isMail($mail);
                    if ($isMail == 0) {
                        return true;
                    } else {
                        return $message = 'Votre email n\'est pas valide!';
                    }
                } else {
                    return $message = 'Votre adresse mail n\'est pas valide';
                }
            } else {
                return $message = 'Vos adresses mails ne correspondent pas';
            }
        } else {
            return $message = 'Tous les champs ne sont pas complétés';
        }
    }

    /**
     * All verification for password, and its errors messages.
     *
     * @return bool|string
     */
    public function checkPass()
    {
        $pass = sha1($_POST['pass']);
        $pass2 = sha1($_POST['confirmation_pass']);
        if (!empty($_POST['pass']) &&
            !empty($_POST['confirmation_pass'])) {
            if ($pass == $pass2) {
                return true;
            } else {
                return $message = 'Vos mots de passes ne correspondent pas';
            }
        } else {
            return $message = 'Tous les champs ne sont pas complétés';
        }
    }

    /**
     * All verification for username, and its errors messages
     *
     * @return bool|string
     */
    public function checkUsername()
    {
        $username = htmlspecialchars($_POST['username']);
        if (!empty($_POST['username'])) {
            if(strlen($username) <= 255) {
                $isPseudo = $this->isPseudo($username);
                if ($isPseudo == 0) {
                    return true;
                } else {
                    return $message = 'Ce pseudo est déjà utilisé. Veuillez en choisir un autre.';
                }
            } else {
                return $message = 'Votre pseudo est trop long';
            }
        } else {
            return $message = 'Tous les champs ne sont pas complétés';
        }
    }


}