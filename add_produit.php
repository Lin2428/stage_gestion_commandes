<?php
require 'bootstrap.php';
$repoPanier = new PanierRepository();
$repoFavorie = new FavorieRepository();

if (!empty($_POST['action']) && $_POST['action'] === '_add_to_cart') {
    $produitId = intval($_POST['id'] ?? null);
    $quantite = 1;
    if (isset($_POST['quantite'])) {
        $quantite = intval($_POST['quantite']) ?? 1;
    }
    $data = $repoPanier->getOrAddCountProduit($produitId);

    if (!empty($data)) {
        $data['quantite'] += 1;
        if (isset($_POST['quantite'])) {
            $data['quantite'] = $quantite;
        }

        $repoPanier->updateCountProduit($data);
        $message = 'La quantité a bien été modifier!';
        $type = 'success';
    } else {
        if ($repoPanier->add($produitId, $quantite)) {
            $message = 'Le produit à bien été ajouté dans le panier!';
            $type = 'success';
        } else {
            $message = 'Une erreur s\'est produite, veuillez réessayer!';
            $type = 'danger';
        }
    }
    $url = $_POST['currentPage'];
    redirect_self($url, $message, $type);
}


if (!empty($_POST['action']) && $_POST['action'] === '_add_to_favorie') {
    $reproduit = intval($_POST['id']);
    $itemId = $repoFavorie->getIdProduit($reproduit);
    if($itemId){
        $repoFavorie->delete($itemId);
        $message = 'Le produit a bien été supprimer de la liste des favorie!';
        $type = 'success';
        $url = $_POST['currentPage'];
        redirect_self($url, $message, $type);
    }else{
        $repoFavorie->add($reproduit);
        $message = 'Le produit a bien été ajouté dans la liste des favorie!';
        $type = 'success';
        $url = $_POST['currentPage'];
        redirect_self($url, $message, $type);
    }

}
