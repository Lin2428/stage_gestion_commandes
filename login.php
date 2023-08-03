<?php
require 'bootstrap.php';
$repo = new ClientRepository();

if (get_user_connect()) {
    header('Location: /compte.php');
    exit();
}
if (is_post() && !empty($_POST['login'] && !empty($_POST['password']))) {
    $user = $repo->findUser($_POST['login']);
    if ($user) {
        if (password_verify($_POST['password'], $user->getPassword())) {
            echo 'ok';
            $options =
                [
                    'cost' => 12,
                ];
            get_user_connect(password_hash($user->getId(), PASSWORD_BCRYPT, $options));
            header('Location: /compte.php');
            exit();
        } else {
            $_GET['password'] = 'error';
        }
    }
} else {
}

view(
    name: 'login',
    pageTitle: "Login",
    layout: "front",
    params: []
);
