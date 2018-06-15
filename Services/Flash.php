<?php

class Flash
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
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