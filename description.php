<?php
require 'bootstrap.php';

$panier = new Panier();

$id[0] = $_GET['id'];
$repoProduit = new ProductRepository();

$produit = $repoProduit->findById($id);

view(
    name: 'description',
    pageTitle: "Description",
    layout: "front",
    params: [
        'produit' => $produit,
    ]
);