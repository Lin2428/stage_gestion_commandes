<?php
require 'bootstrap.php';
$idClient = '';
$id = null ;

$repoClient = new ClientRepository;
$idExistant = $repoClient->getId();

if(!empty($idExistant)){
    $id = (int) end($idExistant[array_key_last($idExistant)]) + 1;
}else{
    $id = $idClient;
}

createIdClient($id);




$repoCategory = new CategoryRepository();
$categories = $repoCategory->getAll();

$repoProduit = new ProductRepository();

$perPage = 10;
$page = intval($_GET['page'] ?? 1);

$total = $repoProduit->getCount();

$itemCount = intval(ceil($total / $perPage));

$produits = $repoProduit->getAll($page, $perPage, $_GET);


view(
    name: 'home',
    pageTitle: "Acceuil",
    layout: "front",
    params: [
        'categories' => $categories,
        'produits' => $produits,
    ]
);