<?php
require 'bootstrap.php';

$email = null;
if (isset($_COOKIE['user_email'])) {
    $email = $_COOKIE['user_email'];
} else {
    header('Location: /compte.php');
    exit;
}


$repo = new ClientRepository();

$client = $repo->findUser($email);

$message = false;

if (isset($_POST['password'])) {
    if (!empty($_POST['password'] && $_POST['cpassword'])) {
        if ($_POST['password'] === $_POST['cpassword']) {

            $options =[
                'cost' => 12,
            ];

            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $id = $client->getId();
            dump($password);
            $repo->updatePassword($id, $password);
            flash_message("Votre mot de passe a été modifier avec succès");
            $message = true;
        }else{
            $_GET['cpassword'] = 'error';
        }
    }
}

view(
    name: 'compte/update_password',
    pageTitle: "Modifier le compte",
    layout: "front",
    params: [
        'message' => $message,
        'client' => $client,
    ]
);
