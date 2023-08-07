<?php
require 'bootstrap.php';
if (!get_user_connect()) {
    header('Location: /compte.php');
    exit();
}

$repoClient = new ClientRepository();
$repoPanier = new PanierRepository();
$repoProduit = new ProductRepository();
$repoCommande = new CommandeRepository();
$email = get_email_user();
$user = $repoClient->findUser($email);
$nombre = $repoCommande->getCount();


if (is_post() && !empty($_POST['adresse'] && $_POST['payement'])) {
    $numero = numero_commande($nombre);
    $id = $user->getId();

    $idCommande = $repoCommande->addCommande(
        numero: $numero,
        adresse: $_POST['adresse'],
        clientId: $id
    );

    $panier = $repoPanier->getAll();

    foreach ($panier as $produit) {
        $produitPrix = $repoProduit->getPrix($produit->getProduitId());

        $repoCommande->addItemsCommande(
            $produitPrix,
            $produit->getQuantite(),
            $produit->getProduitId(),
            $idCommande,
        );


        $repoPanier->delete($produit->getItemId());
    }


    flash_message('Votre commande à été valider avec succès et vou sera bientôt livré !');
    header('Location: /panier.php/?passer=oui');
    die;
}

$panier = [];
$panier = $repoPanier->getAll();
$total = $repoPanier->getPrixTotal();

if (empty($panier)) {
    header('Location: /panier.php');
}

view(
    name: 'validation',
    pageTitle: "Validation",
    layout: "front",
    params: [
        'panier' => $panier,
        'total' => $total,
        'user' => $user,
    ]
);
