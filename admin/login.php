<?php
require '../bootstrap.php';

if (get_admin_connect()) {
    header('Location: ' . base_url('admin/index.php') . '');
    exit;
}

$error = false;
if (is_post() && !empty($_POST['login'] && !empty($_POST['password']))) {
    if ($_POST['login'] === "admin@gmail.com" && $_POST['password'] === "admin123@") {

        get_admin_connect(password_hash($_POST['login'], PASSWORD_BCRYPT));
        header('Location: ' . base_url('admin/index.php'));
        exit();
    } else {
        flash_message("Ce compte n'existe pas ! Veuillez saisir les bonnes informations");
        $_GET['login'] = 'error';
        $_GET['password'] = 'error';
        $error = true;
    }
}

view(
    name: 'admin/login',
    pageTitle: 'Login',
    layout: 'front',
    params: [
        'error' => $error,
    ]
);
