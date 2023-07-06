<?php
require '../../bootstrap.php';

$id = $_GET['id'];

$repo = new CommandeRepository();
$commande = $repo->finById($id);
$articles = $repo->getArticleById($id);

$total = 0;
for($i = 0; $i<count($articles); $i++){
    $total += ($articles[$i]['prix'] * $articles[$i]['quantite']);
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