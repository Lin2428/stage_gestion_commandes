<?php
require '../../bootstrap.php';

$id = $_GET['id'];

$repoCommande = new CommandeRepository();
$commande = $repoCommande->findById($id);

$repoLivreur = new LivreurRepository();
$livreurs = $repoLivreur->getLivreurLookup();

if (is_post()) {
    if (!empty($_POST['livreur_id'] && $_POST['statut'])) {
        $repoCommande->updateCommande(
            id: $id,
            livreur_id: $_POST['livreur_id'],
            statut:  $_POST['statut'],
        );

        redirect('/admin/commandes', "Le livreur à bien été Modifier");
    }
}

view(
    name: 'admin.commandes.update',
    pageTitle: "Liste des commandes",
    params: [
        'commande' => $commande,
        'livreurs' => $livreurs,
    ]
);
