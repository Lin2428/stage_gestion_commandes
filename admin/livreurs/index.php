<?php
require '../../bootstrap.php';

$repo = new LivreurRepository();
$livreurs = $repo->getAll();

view(
    name: 'admin.livreurs.index',
    pageTitle: "Liste des livreurs",
    params: [
       'livreurs' => $livreurs,
    ]
);