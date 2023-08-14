<?php
require '../../bootstrap.php';

if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

$repo = new ProductRepository();

$perPage = 10;
$page = intval($_GET['page'] ?? 1);

$total = $repo->getCount();

$itemCount = intval(ceil($total / $perPage));

$produits = $repo->getAll($page, $perPage, $_GET);

$categories = $repo->getCategoriesLookup();



view(
    name: 'admin.products.index',
    pageTitle: "Liste des produits",
    params: [
        'produits' => $produits,
        'pageCount' => $itemCount,
        'page' => $page,
        'categories' => $categories,
    ]
);
