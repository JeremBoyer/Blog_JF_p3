<?php

/**
 * Class Authentication
 *
 * All static function to check @global $_SESSION['user'].
 */
class Authentication
{

    /**
     * @static Check if user is connected
     * if he is not, he is redirected on LogIn page.
     *
     * @return bool
     */
    static function isLogged()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])) {
            return true;
        } else {
            header('Location: index.php?action=logIn');
        }
    }

    /**
     * @static Check if user is connected.
     *
     * @return bool
     */
    static function isLoggedView()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @static Check if user is  Admin.
     *
     * @return bool
     */
    static function isAdmin()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'Admin' ) {
            return true;
        } else {
            return false;
        }
    }

}