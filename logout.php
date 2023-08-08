<?php
require 'bootstrap.php';

if (get_user_connect()) {
    unset($_COOKIE['user_id']);
    unset($_COOKIE['user_email']);
    setcookie('user_id', '', time() - 10);
    setcookie('user_email', '', time() - 10);
    
    header('Location: /');
    exit();
} else {
    header('Location: /');
    exit();
}
