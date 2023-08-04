<?php
require 'bootstrap.php';
if (!get_user_connect()) {
    header('Location: /compte.php');
    exit();
}

$repoClient = new ClientRepository();
$repoPanier = new PanierRepository();
$repoCommande = new CommandeRepository();
$email = get_email_user();
$user = $repoClient->findUser($email);
$nombre = $repoCommande->getCount();


if(is_post() && !empty($_POST['adresse'] && $_POST['payement'])){
    $numero = numero_commande($nombre);
    $id = $user->getId();

    $repoCommande->addCommande(
        numero: $numero,
        adresse: $_POST['adresse'],
        clientId: $id
    );

    $repoPanier->delete($_COOKIE['visitor_id']);
    flash_message('Votre commande à été valider avec succès et vou sera bientôt livré !');
}

$panier = [];
$panier = $repoPanier->getAll();
$total = $repoPanier->getPrixTotal();

if(empty($panier)){
    header('Location: /panier.php');
}

view(
    name: 'validation',
    pageTitle: "Validation",
    layout: "front",
    params: [
        'panier' => $panier,
        'total' => $total,
    ]
);