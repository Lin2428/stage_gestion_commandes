<?php
require '../../bootstrap.php';

$repo = new ProductRepository();
$produits = $repo->getAll();
$message = read_flash_message();

view(
    name: 'admin.products.index',
    pageTitle: "Liste des produits",
    params: [
        'produits' => $produits,
        'message' => $message,
    ]
);
