<?php

/**
 * Class Authentication
 *
 * All static function to check @global $_SESSION
 */
class Authentication
{

    /**
     * @return bool
     */
    static function isLogged()
    {
        if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])) {
            /**
             * @return true because user is logged.
             */
            return true;
        } else {
            // Redirection to logIn page
            header('Location: index.php?action=logIn');
        }
    }

    /**
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