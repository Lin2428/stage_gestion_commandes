<?php
require 'bootstrap.php';

$panier = new Panier();

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

if (isset($_GET['ajout_panier'])) {
    $id[0] = $_GET['ajout_panier'];

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

/**
 * Ajout au favorie
 */

 if (isset($_GET['favorie'])) {
    $id[0] = intval($_GET['favorie']);

    $produit = $repoProduit->findById($id);

    if ($produit) {
        $getFavorie = $favorie->getFavorie($produit[0]->getId());
        if($getFavorie === true){  
             //$favorie->delete($produit[0]->getId());
        }else{
            $favorie->add($produit[0]->getId());
        } 
    }
}


view(
    name: 'shop',
    pageTitle: "Shop",
    layout: "front",
    params: [
        'categories' => $categories,
        'produits' => $produits,
        'produitPanier' => $produitPanier,
        'countCategorie' => $countCategorie,
    ]
);