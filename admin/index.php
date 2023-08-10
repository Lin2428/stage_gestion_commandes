<?php
require '../bootstrap.php';

if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

$repo = new AdminRepository();

$current = $repo->getCurrent();
$nbLivrer = $repo->getLivrer();
$total = $repo->getRevenuTotal();

view(
    name: 'admin/index',
    pageTitle: 'Tableau de bord',
    params: [
        'current' => $current,
        'livrer' => $nbLivrer,
        'total' => $total,
    ]
);
