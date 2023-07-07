<?php
require '../../bootstrap.php';

$repo = new ClientRepository();
$clients = $repo->getAll();

view(
    name: 'admin.clients.index',
    pageTitle: "Liste des clients",
    params: [
       'clients' => $clients,
    ]
);