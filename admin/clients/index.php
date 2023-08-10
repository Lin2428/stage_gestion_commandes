<?php
require '../../bootstrap.php';
if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

$repo = new ClientRepository();

$perPage = 10;
$page = intval($_GET['page'] ?? 1);

$total = $repo->getCount();

$itemCount = intval(ceil($total / $perPage));

$clients = $repo->getAll($page, $perPage, $_GET);

$search = null;

view(
    name: 'admin.clients.index',
    pageTitle: "Liste des clients",
    params: [
       'clients' => $clients,
       'pageCount' => $itemCount,
        'page' => $page,
        'search' => $search,
    ]
);