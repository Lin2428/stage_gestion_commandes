<?php
require 'bootstrap.php';

$repoCategory = new CategoryRepository();
$categories = $repoCategory->getAll();

$repoProduit = new ProductRepository();

$repoPanier = new PanierRepository();

if (!empty($_POST['action']) && $_POST['action'] === '_add_to_cart') {
    $produitId = intval($_POST['id'] ?? null);
    $data = $repoPanier->getOrAddCountProduit($produitId);

    if (!empty($data)) {
        $data['quantite'] += 1;
        $repoPanier->updateCountProduit($data);
        $message = 'La quantité a bien été modifier!';
        $type = 'success';
    } else {
        if ($repoPanier->add($produitId)) {
            $message = 'Le produit à bien été ajouté dans le panier!';
            $type = 'success';
        } else {
            $message = 'Une erreur s\'est produite, veuillez réessayer!';
            $type = 'danger';
        }
    }
    redirect_self($message, $type);
}


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
