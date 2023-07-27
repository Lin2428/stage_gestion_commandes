<?php
require 'bootstrap.php';

$id = intval($_GET['id']);
$repoProduit = new ProductRepository();

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

view(
    name: 'description',
    pageTitle: "Description",
    layout: "front",
    params: [
        'produit' => $produit,
        'prev' => $prev,
        'next' => $next,
    ]
);