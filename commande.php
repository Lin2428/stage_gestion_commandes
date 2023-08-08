<?php
require 'bootstrap.php';

if (empty(get_user_connect())) {
    header('Location: /login.php');
    exit();
}

$repoClient = new ClientRepository();
$repoCommande = new CommandeRepository();


$client = $repoClient->findUser($_COOKIE['user_email']);
$commandes = $repoCommande->findCommande($client->getId());



$produits = [];
foreach ($commandes as $k => $commande) {
    $produits[$k] = $repoCommande->getArticleById($commande->getId());
    $total = $repoCommande->getPrixTotal($commande->getId());
    $commande->setTotal($total);
}


view(
    name: 'compte/commande',
    pageTitle: "Mon compte",
    layout: "front",
    params: [
        'client' => $client,
        'commandes' => $commandes,
        'produits' => $produits,
    ]
);