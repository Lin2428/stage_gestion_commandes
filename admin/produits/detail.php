<?php
require '../../bootstrap.php';
$id = $_GET['id'];

$produit = new ProductRepository();
$produitGet = $produit->findById($id);

$category = new CategoryRepository();
$categorie = $category->getAll();

$categorieActuel = [
    'id' => $categorie[$produitGet['categorie_id'] -1]['id'],
    'nom' => $categorie[$produitGet['categorie_id'] -1]['nom']
];

view(
    name: 'admin.products.detail',
    pageTitle: "Détails du produit",
    params: [
        'produit' => $produitGet,
        'category' => $categorieActuel
    ]
);
