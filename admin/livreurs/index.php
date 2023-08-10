<?php
require '../../bootstrap.php';
if(!get_admin_connect()){
    header("Location: ./../login.php");
    exit;
   }

$repo = new LivreurRepository();
$livreurs = $repo->getAll();

view(
    name: 'admin.livreurs.index',
    pageTitle: "Liste des livreurs",
    params: [
       'livreurs' => $livreurs,
    ]
);