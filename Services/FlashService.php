<?php

class FlashService
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function get($message, $default = null)
    {

        if (!empty($_SESSION)) {
            return $_SESSION[$message];
        }
        return $default;
    }

    public function setFlash($message, $type = 'danger')
    {
        $_SESSION['flash'] = [
            'type'    => $type,
            'message' => $message
        ];
    }

    public function flash()
    {
        if(isset($_SESSION['flash'])){
    ?>
        <div class="container">
            <div class="alert alert-<?= $_SESSION['flash']['type'] ?>" role="alert">
                <?= $_SESSION['flash']['message'] ?>
            </div>
        </div>
    <?php
            unset($_SESSION['flash']);
        }
    }
}