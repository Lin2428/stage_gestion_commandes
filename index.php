<?php
require 'bootstrap.php';

$panier = new Panier();

$repoCategory = new CategoryRepository();
$categories = $repoCategory->getAll();

$repoProduit = new ProductRepository();

$perPage = 10;
$page = intval($_GET['page'] ?? 1);

$total = $repoProduit->getCount();

$itemCount = intval(ceil($total / $perPage));

$produits = $repoProduit->getAll($page, $perPage, $_GET);

if (isset($_GET['ajout'])) {
    $id[0] = $_GET['ajout'];

    $ajoutProduit = $repoProduit->findById($id);

    if ($ajoutProduit) {
        $panier->add($ajoutProduit[0]->getId());
    }
}

$produitPanier = null;
if ($_SESSION['panier']) {
    $id = array_keys($_SESSION['panier']);

    $produitPanier = $repoProduit->findById($id);
}

view(
    name: 'home',
    pageTitle: "Acceuil",
    layout: "front",
    params: [
        'categories' => $categories,
        'produits' => $produits,
        'produitPanier' => $produitPanier,
    ]
);