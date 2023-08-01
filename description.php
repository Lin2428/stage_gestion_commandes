<?php
require 'bootstrap.php';

$id = intval($_GET['id']);
$repoProduit = new ProductRepository();
$repoPanier = new PanierRepository();

$produitPanier = $repoPanier->getOrAddCountProduit($id);
$countProduit = 1;
$itemId = null;
if(!empty($produitPanier)){
    $countProduit = $produitPanier['quantite'];
    $itemId = $produitPanier['id'];
}

$repoFavorie = new FavorieRepository();
$produitFavories = $repoFavorie->getItemFavorie();
$favs = [];

foreach($produitFavories as $fav) {
    $favs[] = $fav['id'];
}


$produit = $repoProduit->findById($id);

$perPage = 10;
$page = intval($_GET['page'] ?? 1);

$total = $repoProduit->getCount();

$itemCount = intval(ceil($total / $perPage));

$produits = $repoProduit->getAll($page, $perPage, $_GET);

if(empty($produit)){
    $produit = $repoProduit->getAll($page, $perPage, $_GET);
}

$prev = [];
$next = [];


for($i = 0; $i<count($produits); $i++){
    if($produits[$i]->getId() === $produit->getId()){
        if($i != 0){
            $id = $i-1;
            
            $prev = $produits[$id];
        }else{
            $prev = $produits[$i];
        }

        if($i != (count($produits) - 1)){
            $id = $i+1;

            $next = $produits[$id];
        }else{
            $next = $produits[$i];
        }
    }
}


$inFavoris = in_array($produit->getId(), $favs);
$produit->setInFavorite($inFavoris);


view(
    name: 'description',
    pageTitle: "Description",
    layout: "front",
    params: [
        'produit' => $produit,
        'prev' => $prev,
        'next' => $next,
        'countProduit' => $countProduit,
        'itemId' => $itemId,
    ]
);