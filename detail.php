<?php
require 'bootstrap.php';

if (empty(get_user_connect())) {
    header('Location: /login.php');
    exit();
}

$repoClient = new ClientRepository();
$repoCommande = new CommandeRepository();

$id = intval($_POST['id']);

$client = $repoClient->findUser($_COOKIE['user_email']);
$commande = $repoCommande->findById($id);

$produits = $repoCommande->getArticleById($commande->getId());
$total = $repoCommande->getPrixTotal($commande->getId());
$commande->setTotal($total);

view(
    name: 'compte/detail',
    pageTitle: "Mon compte",
    layout: "front",
    params: [
        'client' => $client,
        'commande' => $commande,
        'produits' => $produits,
    ]
);