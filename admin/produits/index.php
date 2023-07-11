<?php
require '../../bootstrap.php';

$repo = new ProductRepository();

$perPage = 10;
$page = intval($_GET['page'] ?? 1);

$total = $repo->getCount();

$itemCount = intval(ceil($total / $perPage));

$produits = $repo->getAll($page, $perPage);



view(
    name: 'admin.products.index',
    pageTitle: "Liste des produits",
    params: [
        'produits' => $produits,
        'pageCount' => $itemCount,
        'page' => $page,
    ]
);
