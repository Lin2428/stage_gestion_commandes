<?php
require '../bootstrap.php';

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
