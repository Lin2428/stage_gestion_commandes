<?php
require 'bootstrap.php';

if (empty(get_user_connect())) {
    header('Location: /login.php');
    exit();
}

$repoClient = new ClientRepository();
$repoCommande = new CommandeRepository();


$client = $repoClient->findUser($_COOKIE['user_email']);
$commandes = $repoCommande->findCommande($client->getId(), statut: true);

$nombreCommande = $repoCommande->getCountClient($client->getId());
$commandePasse = $repoCommande->getCountClient($client->getId(), 'passer');
$commandeLivre = $repoCommande->getCountClient($client->getId(), 'livrer');



$depenceTotal = 0;
$produits = [];
foreach ($commandes as $k => $commande) {
    $produits[$k] = $repoCommande->getArticleById($commande->getId());
    $total = $repoCommande->getPrixTotal($commande->getId());
    $commande->setTotal($total);
    $depenceTotal = $commande->getTotalPrix();
}



view(
    name: 'compte',
    pageTitle: "Mon compte",
    layout: "front",
    params: [
        'client' => $client,
        'commandes' => $commandes,
        'produits' => $produits,
        'nombreCommande' => $nombreCommande,
        'commandePasse' => $commandePasse,
        'commandeLivre' => $commandeLivre,
        'depenceTotal' => $depenceTotal,
    ]
);
