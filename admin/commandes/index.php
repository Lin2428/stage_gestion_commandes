<?php
require '../../bootstrap.php';
if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

$repo = new CommandeRepository();

$perPage = 50;
$page = intval($_GET['page'] ?? 1);
$total = $repo->getCount();

$itemCount = intval(ceil($total / $perPage));

$commandes = $repo->getAll($page, $perPage, $_GET);

view(
    name: 'admin.commandes.index',
    pageTitle: "Liste des commandes",
    params: [
        'commandes' => $commandes,
        'pageCount' => $itemCount,
        'page' => $page,
    ]
);
