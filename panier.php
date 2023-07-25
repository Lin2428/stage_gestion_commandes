<?php
require 'bootstrap.php';

$panier = new Favorie();

$repoProduit = new ProductRepository();

$produits = [];
if ($_SESSION['panier']) {
    $id = array_keys($_SESSION['panier']);

    $produits = $repoProduit->findById($id);
}


view(
    name: 'panier',
    pageTitle: "Panier",
    layout: "front",
    params: [
        'produits' => $produits,
    ]
);