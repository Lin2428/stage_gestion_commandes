<?php
require 'bootstrap.php';

$repoCategory = new CategoryRepository();
$categories = $repoCategory->getAll();

$repoProduit = new ProductRepository();

$countCategorie = [];
for($i = 0; $i<count($categories); $i++){
    $countCategorie[$i] = $repoProduit->getCountCategory($categories[$i]->getId());
}

$perPage = 10;
$page = intval($_GET['page'] ?? 1);

$total = $repoProduit->getCount();

$itemCount = intval(ceil($total / $perPage));

$produits = $repoProduit->getAll($page, $perPage, $_GET);


view(
    name: 'shop',
    pageTitle: "Shop",
    layout: "front",
    params: [
        'categories' => $categories,
        'produits' => $produits,
        'countCategorie' => $countCategorie,
    ]
);