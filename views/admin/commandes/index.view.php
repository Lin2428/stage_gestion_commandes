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
<div class="d-flex justify-content-between mb-4">
    <h1 class="h2">Liste des commades</h1>
</div>
<div class="">
    <form method="GET" class="d-flex justify-content-between mb-2" role="search">
        <?= form_input(type: 'number', label: false, name: 'numero', required: false, placeholder: 'Réchercher par numéro', valueSource: 'GET') ?>
        <?= form_input(label: false, type: 'date', name: 'date', required: false, valueSource: 'GET') ?>
        <?= form_input(label: false, name: 'search', required: false, placeholder: 'Réchercher par nom ou tel', valueSource: 'GET') ?>
        <?= form_input(label: false, name: "statut", type: "select", required: false, options: $status, valueSource: 'GET') ?>
        <button class="btn btn-outline-secondary" type="submit"><span data-feather="search"></span></button>
    </form>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-responsive " style="width:100%">
            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Statut</th>
                    <th>Création</th>
                    <th>Client</th>
                    <th>ID Livreur</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $commande) : ?>
                    <tr>
                        <td><?= $commande->getNumero() ?></td>

                        <td><span class="badge bg-warning"><?= $commande->getStatut() ?></span></td>
                        <td><?= $commande->getCreatedAt() ?></td>
                        <td><?= $commande->clientNom ?></td>
                        <td><?= $commande->livreurNom ?></td>
                        <td><?= liste_action($commande->getId(), "commandes") ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-center align-items-center">
            <?php if ($pageCount != null && $page != null) : ?>
                <?php paginate($pageCount, $page, '/admin/commandes'); ?>
            <?php endif ?>
        </div>
    </div>
</div>