<?php

/**
 * Class Flash
 *
 * All function for flash.
 */
class Flash
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Function to set the flash message and its type
     *
     * @param string $message
     * @param string $type (css bootstrap class)
     */
    public function setFlash($message, $type = 'danger')
    {
        $_SESSION['flash'] = [
            'type'    => $type,
            'message' => $message
        ];
    }

    /**
     * Method for show flash message if it exist.
     */
    public function flash()
    {
        if (isset($_SESSION['flash'])) {
    ?>
        <div class="container">
            <div class="alert alert-<?= $_SESSION['flash']['type'] ?>" role="alert">
                <?php echo $_SESSION['flash']['message'] ?>
            </div>
        </div>
    <?php
            unset($_SESSION['flash']);
        }
    }
}