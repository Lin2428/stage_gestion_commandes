<?php 
$status = [
    '' => 'Sélectionner un statut',
    'passer' => 'Commande non traité',
    'traiter' => 'Commande traité',
    'livraison' => 'En cours de livraison',
    'livrer' => 'Commande livrée',
    'annuler' => 'Commande annulée',
];
?>

<div class="container p-0">

    <div class="d-flex justify-content-between">
        <h1 class="h2 d-inline align-middle">Modifier la commande</h1>
        <a href="admin/commandes/" class="btn btn-primary mb-4">Liste des commandes</a>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <p>Numéro de la commande: <strong> <?= $commande->getId() ?></strong></p>
                <div class="form-group">
                    <?= form_input(label: "Livreur", name: "livreur_id", type: "select", options: $livreurs, default: $commande->getLivreurId()) ?>
                    <?= form_input(label: false, name: "statut", type: "select", options: $status, default: $commande->getStatut()) ?>
                    <button type="submit" class="btn btn-info mt-2">Modifier</button>
                </div>
            </div>
        </div>
    </form>
</div>