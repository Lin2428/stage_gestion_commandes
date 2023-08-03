<?php
require 'bootstrap.php';
$repo = new ClientRepository();
$lastId = $repo->getLastId();
flash_message("Votre compte a été créeé avec succès");
$create = false;
if (is_post()) {
    if (!empty($_POST['nom'] && $_POST['tel'] && $_POST['password'] && $_POST['cpassword'])) {
        if (strlen($_POST['tel']) === 9) {
            if ($_POST['password'] === $_POST['cpassword']) {
                $options = [
                    'cost' => 12,
                ];

                $password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
                $id = $lastId + 1;
                $data = [
                    'id' => $id,
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['nom'],
                    'email' => $_POST['email'],
                    'tel' => $_POST['tel'],
                    'password' => $password,

                ];

                $repo->createClient($data);

                flash_message("Votre compte a été créeé avec succès");
                $create = true;
            } else {
                $_GET['cpassword'] = 'error';
            }
        } else {
            $_GET['tel'] = 'error';
        }
    }
}

view(
    name: 'create',
    pageTitle: "Créer un compte",
    layout: "front",
    params: [
        'create' => $create,
    ]
);
