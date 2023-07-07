<?php
require '../../bootstrap.php';

$repo = new CommandeRepository();
$commandes = $repo->getAll();

dd($commandes);
view(
    name: 'admin.commandes.index',
    pageTitle: "Liste des commandes",
    params: [
     'commandes' => $commandes,
    ]
);