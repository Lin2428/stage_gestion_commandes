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

$userExiste = false;
$create = $_GET['create'] ?? false;
if (isset($_POST['nom'])) {
    if (!empty($_POST['nom'] && $_POST['tel'])) {
        if (strlen($_POST['tel']) === 9) {

            if (($_POST['email'] === $client->getEmail()) && ($_POST['tel'] === $client->getTel())) {

                $data = $_POST;
                $data['id'] = $client->getId();

                $repo->updateClient($data);
                flash_message("Votre compte a été modifier avec succès");
            } else if ($repo->findUser($_POST['email']) || $repo->findUser($_POST['tel'])) {
                flash_message('Ce compte existe déja ! Veuiller changer l\'email ou le numéro de téléphone');
                $userExiste = true;
            } else {
                flash_message("Votre compte a été modifier avec succès");
                $data = $_POST;
                $data['id'] = $client->getId();
            }
        } else {
            $_GET['tel'] = 'error';
        }
    }
}

$client = $repo->findUser($email);

view(
    name: 'compte/update_compte',
    pageTitle: "Modifier le compte",
    layout: "front",
    params: [
        'create' => $create,
        'userExiste' => $userExiste,
        'client' => $client,
    ]
);
