<?php
require '../bootstrap.php';

if (get_admin_connect()) {
    unset($_COOKIE['admin_id']);
    setcookie('admin_id', '', time() - 10); 
    header('Location: /');
    exit();
} else {
    header('Location: /');
    exit();
}
