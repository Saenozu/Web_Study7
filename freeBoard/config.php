<?php
    session_start();

    if (isset($_SESSION['is_login'])) {
        if (isset($_SESSION['user_name']) || isset($_SESSION['user_id'])) {
            $login_name = $_SESSION['user_name'];
            $login_id = $_SESSION['user_id'];
        }
    }
    else {
        $login_name = '';
        $login_id = '';
    }
?>