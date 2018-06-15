<?php
class Authentication
{
    static function isLogged()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])) {
            return true;
        } else {
            return false;
        }
    }

    static function isAdmin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'Admin' ) {
            return true;
        } else {
            return false;
        }
    }
}