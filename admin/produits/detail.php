<?php
require '../../bootstrap.php';
$id = $_GET['id'];

$repository = new ProductRepository();
$produit = $repository->findById($id);

view(
    name: 'admin.products.detail',
    pageTitle: "Détails du produit",
    params: [
        'produit' => $produit,
    ]
);
