<?php
require '../../bootstrap.php';

if(!get_admin_connect()){
    header('Location: '. base_url('admin/login.php').'');
    exit;
   }

if (is_post() && !empty($_POST['id'])) {

    $id = $_POST['id'];

    $repos = new ProductRepository();
    $produit = $repos->findById($id);

    $statut = 0;
    if ($produit->getStatut() === 0) {
        $statut = 1;
        flash_message("Le produit a bient été mis en vente");
    }else{
        flash_message("Le produit a bient été mis hors vente");
    }

    $repos->updateStatut($id, $statut);
    header('Location: admin/produits/');
    die();
} else {
    flash_message("Il ne s'est rien passé", "danger");
    header('Location: admin/produits/');
    die();
}



// view(
//     name: 'admin.products.delete',
//     pageTitle: "Suppréssion du produi",
//     params: []
// );
