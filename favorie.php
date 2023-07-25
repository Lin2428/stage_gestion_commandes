<?php
require 'bootstrap.php';

$favorie = new Favorie();

$repoProduit = new ProductRepository();

$produitFavorie = [];
if ($_SESSION['favorie']) {
    $id = array_keys($_SESSION['favorie']);

    $produitFavorie = $repoProduit->findById($id);
}


view(
    name: 'favorie',
    pageTitle: "Favorie",
    layout: "front",
    params: [
        'produitFavorie' => $produitFavorie,
    ]
);