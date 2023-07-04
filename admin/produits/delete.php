<?php
require '../../bootstrap.php';

if (isset($_POST) && !empty($_POST['id'])) {

    $delete = new ProductRepository();
    $delete->DeleteProduit($_POST['id']);
    
    flash_message("Le produit a bient été supprimé");
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
