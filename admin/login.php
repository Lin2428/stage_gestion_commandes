<?php
require '../bootstrap.php';

if (get_admin_connect()) {
    header('Location: ' . base_url('admin/index.php') . '');
    exit;
}

$repo = new AdminRepository();

$error = false;
if (is_post() && !empty($_POST['email'] && !empty($_POST['password']))) {
    $admin =  $repo->getAdmin($_POST['email']);
    if ($admin) {

        if (password_verify($_POST['password'], $admin->getPassword())) {
            get_admin_connect(password_hash($_POST['email'], PASSWORD_BCRYPT));
            header('Location: ' . base_url('admin/index.php'));
            exit();
        } else {
            $_GET['password'] = 'error';
        }
    } else {
        flash_message("Ce compte n'existe pas ! Veuillez saisir les bonnes informations");
        $_GET['email'] = 'error';
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
