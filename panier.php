<?php
require 'bootstrap.php';
$panier = [];
$repoPanier = new PanierRepository();

$panier = $repoPanier->getAll();

if (isset($_POST['update_panier'])) {
    for ($i = 0; $i < count($panier); $i++) {
        $quanite = intval($_POST['quanite' . $panier[$i]->getProduitId()]);

        if ($quanite) {
            $data = [
                'id' => $panier[$i]->getItemId(),
                'quantite' => $quanite,
            ];

            $repoPanier->updateCountProduit($data);
        }else{
            $repoPanier->delete($panier[$i]->getItemId());
        }
    }

    flash_message("Le panier à bient été modifier");
}

$total = $repoPanier->getPrixTotal();
$panier = $repoPanier->getAll();

view(
    name: 'panier',
    pageTitle: "Panier",
    layout: "front",
    params: [
        'panier' => $panier,
        'total' => $total,
    ]
);
