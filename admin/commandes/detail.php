<?php
require '../../bootstrap.php';

$id = $_GET['id'];

$repo = new CommandeRepository();
$commande = $repo->findById($id);

$articles = $repo->getArticleById($commande->getId());

$total = 0;
for($i = 0; $i<count($articles); $i++){
    $total += ($articles[$i]->getPrix() * $articles[$i]->getQuantite());
}

view(
    name: 'admin.commandes.detail',
    pageTitle: "Details de la commande",
    params: [
        'commande' => $commande,
        'articles' => $articles,
        'total' => "$total",
    ]
);