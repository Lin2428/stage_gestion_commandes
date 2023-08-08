<?php
require 'bootstrap.php';

if (empty(get_user_connect())) {
    header('Location: /login.php');
    exit();
}

$repoClient = new ClientRepository();

$client = $repoClient->findUser($_COOKIE['user_email']);

view(
    name: 'compte/profil',
    pageTitle: "Mon compte",
    layout: "front",
    params: [
        'client' => $client,
    ]
);