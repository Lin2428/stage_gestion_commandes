<?php
require '../../bootstrap.php';
$id = $_GET['id'];

$repository = new LivreurRepository();
$livreur = $repository->findById($id);


view(
    name: 'admin.livreurs.detail',
    pageTitle: "Détails du livreur",
    params: [
        'livreur' => $livreur,
    ]
);