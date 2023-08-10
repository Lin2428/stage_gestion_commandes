<?php
require '../../bootstrap.php';

if(!get_admin_connect()){
    header("Location: ../login.php");
    exit;
   }
$id = $_GET['id'];

$repository = new ProductRepository();
$produit = $repository->findById($id);

view(
    name: 'admin.products.detail',
    pageTitle: "Détails du produit",
    params: [
        'produit' => $produit,
    ]
);
