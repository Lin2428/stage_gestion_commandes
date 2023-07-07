<?php
require '../../bootstrap.php';

$repo = new ProductRepository();
$produits = $repo->getAll();


view(
    name: 'admin.products.index',
    pageTitle: "Liste des produits",
    params: [
        'produits' => $produits,
    ]
);
