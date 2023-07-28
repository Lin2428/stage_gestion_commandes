<?php
require 'bootstrap.php';

$repoCategory = new CategoryRepository();
$categories = $repoCategory->getAll();

$repoProduit = new ProductRepository();

$repoFavorie = new FavorieRepository();
$produitFavories = $repoFavorie->getItemFavorie();
$favs = [];

foreach($produitFavories as $fav) {
    $favs[] = $fav['id'];
}

$perPage = 10;
$page = intval($_GET['page'] ?? 1);

$total = $repoProduit->getCount();

$itemCount = intval(ceil($total / $perPage));

$produits = $repoProduit->getAll($page, $perPage, $_GET);


foreach ($produits as $produit) {
    $inFavoris = in_array($produit->getId(), $favs);
    $produit->setInFavorite($inFavoris);
}

view(
    name: 'home',
    pageTitle: "Acceuil",
    layout: "front",
    params: [
        'categories' => $categories,
        'produits' => $produits,
        'produitFavories' => $produitFavories,
    ]
);
