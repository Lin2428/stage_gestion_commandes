<?php
require 'bootstrap.php';

$repoCategory = new CategoryRepository();
$categories = $repoCategory->getAll();

$repoProduit = new ProductRepository();


$countCategorie = [];
for ($i = 0; $i < count($categories); $i++) {
    $countCategorie[$i] = $repoProduit->getCountCategory($categories[$i]->getId());
}

$repoFavorie = new FavorieRepository();
$produitFavories = $repoFavorie->getItemFavorie();
$favs = [];

foreach ($produitFavories as $fav) {
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

$shopName = null;
if (isset($_GET['category'])) {
    $cat[] = intval($_GET['category']);
    foreach ($categories as $category) {
        $isCategory = in_array($category->getId(), $cat);
        $category->setInCategory($isCategory);
    }

    $shopName = $repoCategory->findById(intval($_GET['category']));
    if (!empty($shopName)) {
        $shopName = $shopName->getNom();
    }
}


view(
    name: 'shop',
    pageTitle: "Shop",
    layout: "front",
    params: [
        'categories' => $categories,
        'produits' => $produits,
        'countCategorie' => $countCategorie,
        'shopName' => $shopName,
    ]
);
