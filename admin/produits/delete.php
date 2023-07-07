<?php
require '../../bootstrap.php';

if (is_post() && !empty($_POST['id'])) {

    // $repo = new ProductRepository();
    // $repo ->deleteProduit($_POST['id']);
    
    flash_message("Le produit a bient été mis hors vente");
    header('Location: admin/produits/');
    die();
} else {
    flash_message("Il ne s'est rien passé", "danger");
    header('Location: admin/produits/');
    die();
}



view(
    name: 'admin.products.delete',
    pageTitle: "Suppréssion du produi",
    params: []
);
