<?php
require '../../bootstrap.php';

$repo = new CommandeRepository();


//$nbCommande = (int) $repo->getCount()['nb_commande'];

$perPage = 100;
$page = intval($_GET['page'] ?? 1);
$total = $repo->getCount();

$itemCount = intval(ceil($total / $perPage));

$commandes = $repo->getAll($page, $perPage);

/*
if (!empty($_GET['page'])) {
    $currentPage = (int) strip_tags($_GET['page']);
} else {
    $currentPage = 1;
}

$nbParPage = 15;

$pages = $nbCommande / $nbParPage;

$premier = ($currentPage * $nbParPage) - $nbParPage;



$marge = null;

if ($currentPage === 1) {
    $marge = 1;
} else {
    $marge = $currentPage -1;
}*/

view(
    name: 'admin.commandes.index',
    pageTitle: "Liste des commandes",
    params: [
        'commandes' => $commandes,
        'pageCount' => $itemCount,
        'page' => $page,
    ]
);
